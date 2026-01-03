<?php

namespace App\Services;

use App\Models\Branch;
use Illuminate\Pagination\LengthAwarePaginator;

class BranchService
{
    /**
     * Get paginated list of branches with optional search and filters.
     */
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = Branch::query();

        // Search functionality
        if (isset($filters['search']) && $filters['search']) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%")
                    ->orWhere('state', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if (isset($filters['status']) && $filters['status'] !== '') {
            $query->where('status', $filters['status']);
        }

        return $query->latest()->paginate($perPage);
    }

    /**
     * Get a single branch by ID.
     */
    public function findById(int $id): ?Branch
    {
        return Branch::find($id);
    }

    /**
     * Create a new branch.
     */
    public function create(array $data): Branch
    {
        // Ensure status is set
        if (! isset($data['status'])) {
            $data['status'] = true;
        }

        return Branch::create($data);
    }

    /**
     * Update an existing branch.
     */
    public function update(Branch $branch, array $data): Branch
    {
        $branch->update($data);

        return $branch->fresh();
    }

    /**
     * Delete a branch (soft delete).
     */
    public function delete(Branch $branch): bool
    {
        return $branch->delete();
    }

    /**
     * Bulk delete branches.
     */
    public function bulkDelete(array $ids): int
    {
        return Branch::whereIn('id', $ids)->delete();
    }

    /**
     * Restore a soft-deleted branch.
     */
    public function restore(Branch $branch): bool
    {
        return $branch->restore();
    }

    /**
     * Permanently delete a branch.
     */
    public function forceDelete(Branch $branch): bool
    {
        return $branch->forceDelete();
    }
}
