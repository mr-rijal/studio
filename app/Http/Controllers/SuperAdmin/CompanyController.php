<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Mail\SendUserInvitationMail;
use App\Models\Company;
use App\Models\Domain;
use App\Models\Role;
use App\Models\User;
use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CompanyController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected CompanyService $companyService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $companies = $this->companyService->paginate();

        return view('superadmin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $company = null;

        return view('superadmin.companies.form', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('companies/logos', 'public');
        }

        // Extract user data
        $userData = [
            'first_name' => $data['user_first_name'],
            'last_name' => $data['user_last_name'],
            'email' => $data['user_email'],
        ];
        unset($data['user_first_name'], $data['user_last_name'], $data['user_email']);

        // Create company and user in transaction
        $company = DB::transaction(function () use ($data, $userData) {
            // Get default role for web guard
            $role = Role::where('guard', 'web')->first();

            if (! $role) {
                throw new \Exception('No default role found for web guard.');
            }

            // Create company first
            $company = $this->companyService->create($data);

            // Create user with temporary password
            $user = User::create([
                'company_id' => $company->id,
                'role_id' => $role->id,
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'email' => $userData['email'],
                'password' => Hash::make(Str::random(32)), // Temporary password
                'force_password_change' => true,
                'status' => true,
            ]);

            // Generate password reset token for invitation
            // Use Password facade to create token (this stores it hashed in the database)
            // We'll send the plain token in the email, Laravel will hash it when verifying
            $token = Str::random(64);
            // Store the hashed token - Laravel's Password::reset() will hash the provided token and compare
            DB::table('password_reset_tokens')->updateOrInsert(
                ['email' => $user->email],
                [
                    'token' => Hash::make($token),
                    'created_at' => now(),
                ]
            );

            // Send invitation email
            Mail::to($user->email)->send(new SendUserInvitationMail($user, $token));

            return $company;
        });

        return redirect()
            ->route('s.companies.show', $company)
            ->with('success', 'Company created successfully. Invitation email has been sent to the user.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company): View
    {
        $company = $this->companyService->findById($company->id);

        if (! $company) {
            abort(404);
        }

        $users = User::select('id', 'first_name', 'last_name', 'email')->orderBy('first_name')->get();
        $plans = \App\Models\Plan::where('status', true)->orderBy('name')->get();
        $subscriptions = $company->subscriptions()->with('plan')->latest()->get();

        return view('superadmin.companies.show', compact('company', 'users', 'plans', 'subscriptions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company): View
    {
        $company = $this->companyService->findById($company->id);

        if (! $company) {
            abort(404);
        }

        return view('superadmin.companies.form', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $data = $request->validated();

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($company->logo && Storage::exists($company->logo)) {
                Storage::delete($company->logo);
            }
            $data['logo'] = $request->file('logo')->store('companies/logos', 'public');
        }

        $this->companyService->update($company, $data);

        return redirect()
            ->route('s.companies.show', $company)
            ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company): RedirectResponse
    {
        $this->companyService->delete($company);

        return redirect()
            ->route('s.companies.index')
            ->with('success', 'Company deleted successfully.');
    }

    /**
     * Bulk delete companies.
     */
    public function bulkDestroy(Request $request): RedirectResponse
    {
        $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['exists:companies,id'],
        ]);

        $count = 0;
        foreach ($request->ids as $id) {
            $company = Company::find($id);
            if ($company) {
                $this->companyService->delete($company);
                $count++;
            }
        }

        return redirect()
            ->route('s.companies.index')
            ->with('success', "{$count} company(ies) deleted successfully.");
    }

    /**
     * Toggle domain active/inactive status.
     */
    public function toggleDomain(Company $company, Domain $domain): JsonResponse
    {
        // Verify the domain belongs to the company
        if ($domain->company_id !== $company->id) {
            return response()->json([
                'success' => false,
                'message' => 'Domain does not belong to this company.',
            ], 403);
        }

        // Toggle the status
        $domain->status = ! $domain->status;
        $domain->save();

        return response()->json([
            'success' => true,
            'status' => $domain->status,
            'message' => $domain->status ? 'Domain activated successfully.' : 'Domain deactivated successfully.',
        ]);
    }
}
