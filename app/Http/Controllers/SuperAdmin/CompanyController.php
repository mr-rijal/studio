<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\Domain;
use App\Models\User;
use App\Services\CompanyService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $users = User::select('id', 'first_name', 'last_name', 'email')->orderBy('first_name')->get();

        return view('superadmin.companies.index', compact('companies', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $users = User::select('id', 'first_name', 'last_name', 'email')->orderBy('first_name')->get();
        $company = null;

        return view('superadmin.companies.form', compact('company', 'users'));
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

        $company = $this->companyService->create($data);

        return redirect()
            ->route('s.companies.show', $company)
            ->with('success', 'Company created successfully.');
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

        $users = User::select('id', 'first_name', 'last_name', 'email')->orderBy('first_name')->get();

        return view('superadmin.companies.form', compact('company', 'users'));
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
        $domain->status = !$domain->status;
        $domain->save();

        return response()->json([
            'success' => true,
            'status' => $domain->status,
            'message' => $domain->status ? 'Domain activated successfully.' : 'Domain deactivated successfully.',
        ]);
    }
}
