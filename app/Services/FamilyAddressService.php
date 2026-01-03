<?php

namespace App\Services;

use App\Models\FamilyAddress;
use Illuminate\Pagination\LengthAwarePaginator;

class FamilyAddressService
{
    /**
     * Get paginated list of family addresses with optional search and filters.
     */
    public function paginate(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = FamilyAddress::with('family');

        // Search functionality
        if (isset($filters['search']) && $filters['search']) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('home_address', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%")
                    ->orWhere('state', 'like', "%{$search}%")
                    ->orWhere('zip', 'like', "%{$search}%");
            });
        }

        // Filter by family
        if (isset($filters['family_id']) && $filters['family_id']) {
            $query->where('family_id', $filters['family_id']);
        }

        return $query->latest()->paginate($perPage);
    }

    /**
     * Get a single family address by ID.
     */
    public function findById(int $id): ?FamilyAddress
    {
        return FamilyAddress::with('family')->find($id);
    }

    /**
     * Create a new family address.
     */
    public function create(array $data): FamilyAddress
    {
        return FamilyAddress::create($data);
    }

    /**
     * Update an existing family address.
     */
    public function update(FamilyAddress $familyAddress, array $data): FamilyAddress
    {
        $familyAddress->update($data);

        return $familyAddress->fresh(['family']);
    }

    /**
     * Delete a family address (soft delete).
     */
    public function delete(FamilyAddress $familyAddress): bool
    {
        return $familyAddress->delete();
    }

    /**
     * Bulk delete family addresses.
     */
    public function bulkDelete(array $ids): int
    {
        return FamilyAddress::whereIn('id', $ids)->delete();
    }

    /**
     * Restore a soft-deleted family address.
     */
    public function restore(FamilyAddress $familyAddress): bool
    {
        return $familyAddress->restore();
    }

    /**
     * Permanently delete a family address.
     */
    public function forceDelete(FamilyAddress $familyAddress): bool
    {
        return $familyAddress->forceDelete();
    }
}
