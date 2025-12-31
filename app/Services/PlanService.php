<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Pagination\LengthAwarePaginator;

class PlanService
{
    /**
     * Get paginated list of plans.
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Plan::latest()
            ->paginate($perPage);
    }

    /**
     * Get a single plan by ID.
     */
    public function findById(int $id): ?Plan
    {
        return Plan::find($id);
    }

    /**
     * Create a new plan.
     */
    public function create(array $data): Plan
    {
        return Plan::create($data);
    }

    /**
     * Update an existing plan.
     */
    public function update(Plan $plan, array $data): Plan
    {
        $plan->update($data);

        return $plan->fresh();
    }

    /**
     * Delete a plan (soft delete).
     */
    public function delete(Plan $plan): bool
    {
        return $plan->delete();
    }

    /**
     * Restore a soft-deleted plan.
     */
    public function restore(Plan $plan): bool
    {
        return $plan->restore();
    }

    /**
     * Permanently delete a plan.
     */
    public function forceDelete(Plan $plan): bool
    {
        return $plan->forceDelete();
    }
}
