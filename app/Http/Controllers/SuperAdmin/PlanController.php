<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Models\Plan;
use App\Services\PlanService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PlanController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected PlanService $planService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $plans = $this->planService->paginate();

        return view('superadmin.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $plan = null;
        $availablePermissions = config('plan_permissions.permissions', []);

        return view('superadmin.plans.form', compact('plan', 'availablePermissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Ensure features and permissions are arrays, filter out empty values
        if (isset($data['features'])) {
            $data['features'] = array_filter($data['features']);
        }
        if (isset($data['permissions'])) {
            $data['permissions'] = array_filter($data['permissions']);
        }

        $plan = $this->planService->create($data);

        return redirect()
            ->route('s.plans.show', $plan)
            ->with('success', 'Plan created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan): View
    {
        $plan = $this->planService->findById($plan->id);

        if (! $plan) {
            abort(404);
        }

        $availablePermissions = config('plan_permissions.permissions', []);

        return view('superadmin.plans.show', compact('plan', 'availablePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan): View
    {
        $plan = $this->planService->findById($plan->id);

        if (! $plan) {
            abort(404);
        }

        $availablePermissions = config('plan_permissions.permissions', []);

        return view('superadmin.plans.form', compact('plan', 'availablePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, Plan $plan): RedirectResponse
    {
        $data = $request->validated();

        // Ensure features and permissions are arrays, filter out empty values
        if (isset($data['features'])) {
            $data['features'] = array_filter($data['features']);
        }
        if (isset($data['permissions'])) {
            $data['permissions'] = array_filter($data['permissions']);
        }

        $this->planService->update($plan, $data);

        return redirect()
            ->route('s.plans.show', $plan)
            ->with('success', 'Plan updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan): RedirectResponse
    {
        $this->planService->delete($plan);

        return redirect()
            ->route('s.plans.index')
            ->with('success', 'Plan deleted successfully.');
    }

    /**
     * Bulk delete plans.
     */
    public function bulkDestroy(Request $request): RedirectResponse
    {
        $request->validate([
            'ids' => ['required', 'array'],
            'ids.*' => ['exists:plans,id'],
        ]);

        $count = 0;
        foreach ($request->ids as $id) {
            $plan = Plan::find($id);
            if ($plan) {
                $this->planService->delete($plan);
                $count++;
            }
        }

        return redirect()
            ->route('s.plans.index')
            ->with('success', "{$count} plan(s) deleted successfully.");
    }
}
