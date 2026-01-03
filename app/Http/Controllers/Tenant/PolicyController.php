<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePolicyRequest;
use App\Http\Requests\UpdatePolicyRequest;
use App\Models\Policy;
use App\Services\PolicyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PolicyController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected PolicyService $policyService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $filters = [
            'search' => $request->get('search'),
            'status' => $request->get('status'),
        ];

        $policies = $this->policyService->paginate($filters, 15)
            ->withQueryString();

        return view('tenant.policies.index', compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $policy = null;

        return view('tenant.policies.form', compact('policy'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePolicyRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['status'] = $request->has('status') ? (bool) $request->status : true;

        $this->policyService->create($data);

        return redirect()
            ->route('policies.index')
            ->with('success', 'Policy created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Policy $policy): View
    {
        $policy = $this->policyService->findById($policy->id);

        if (! $policy) {
            abort(404);
        }

        return view('tenant.policies.show', compact('policy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Policy $policy): View
    {
        $policy = $this->policyService->findById($policy->id);

        if (! $policy) {
            abort(404);
        }

        return view('tenant.policies.form', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePolicyRequest $request, Policy $policy): RedirectResponse
    {
        $data = $request->validated();

        if ($request->has('status')) {
            $data['status'] = (bool) $request->status;
        }

        $this->policyService->update($policy, $data);

        return redirect()
            ->route('policies.index')
            ->with('success', 'Policy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Policy $policy): RedirectResponse
    {
        $this->policyService->delete($policy);

        return redirect()
            ->route('policies.index')
            ->with('success', 'Policy deleted successfully.');
    }

    /**
     * Bulk delete policies.
     */
    public function bulkDestroy(Request $request): RedirectResponse
    {
        $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['exists:policies,id'],
        ]);

        $count = $this->policyService->bulkDelete($request->ids);

        return redirect()
            ->route('policies.index')
            ->with('success', "{$count} policy(s) deleted successfully.");
    }
}
