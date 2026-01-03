<?php

namespace App\Services;

use App\Models\Policy;
use Illuminate\Pagination\LengthAwarePaginator;

class PolicyService
{
    /**
     * Get paginated list of policies with optional search and filters.
     */
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = Policy::query();

        // Search functionality
        if (isset($filters['search']) && $filters['search']) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if (isset($filters['status']) && $filters['status'] !== '') {
            $query->where('status', $filters['status']);
        }

        return $query->latest()->paginate($perPage);
    }

    /**
     * Get a single policy by ID.
     */
    public function findById(int $id): ?Policy
    {
        return Policy::find($id);
    }

    /**
     * Create a new policy.
     */
    public function create(array $data): Policy
    {
        // Ensure status is set
        if (! isset($data['status'])) {
            $data['status'] = true;
        }

        return Policy::create($data);
    }

    /**
     * Update an existing policy.
     */
    public function update(Policy $policy, array $data): Policy
    {
        $policy->update($data);

        return $policy->fresh();
    }

    /**
     * Delete a policy (soft delete).
     */
    public function delete(Policy $policy): bool
    {
        return $policy->delete();
    }

    /**
     * Bulk delete policies.
     */
    public function bulkDelete(array $ids): int
    {
        return Policy::whereIn('id', $ids)->delete();
    }

    /**
     * Restore a soft-deleted policy.
     */
    public function restore(Policy $policy): bool
    {
        return $policy->restore();
    }

    /**
     * Permanently delete a policy.
     */
    public function forceDelete(Policy $policy): bool
    {
        return $policy->forceDelete();
    }
}
