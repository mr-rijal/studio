<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    /**
     * Get paginated list of categories with optional search and filters.
     */
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = Category::query();

        // Search functionality
        if (isset($filters['search']) && $filters['search']) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
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
     * Get a single category by ID.
     */
    public function findById(int $id): ?Category
    {
        return Category::find($id);
    }

    /**
     * Create a new category.
     */
    public function create(array $data): Category
    {
        // Ensure status is set
        if (! isset($data['status'])) {
            $data['status'] = true;
        }

        return Category::create($data);
    }

    /**
     * Update an existing category.
     */
    public function update(Category $category, array $data): Category
    {
        $category->update($data);

        return $category->fresh();
    }

    /**
     * Delete a category (soft delete).
     */
    public function delete(Category $category): bool
    {
        return $category->delete();
    }

    /**
     * Bulk delete categories.
     */
    public function bulkDelete(array $ids): int
    {
        return Category::whereIn('id', $ids)->delete();
    }

    /**
     * Restore a soft-deleted category.
     */
    public function restore(Category $category): bool
    {
        return $category->restore();
    }

    /**
     * Permanently delete a category.
     */
    public function forceDelete(Category $category): bool
    {
        return $category->forceDelete();
    }
}
