<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Domain;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class CompanyService
{
    /**
     * Get paginated list of companies.
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Company::with(['user', 'domains'])
            ->latest()
            ->paginate($perPage);
    }

    /**
     * Get a single company by ID.
     */
    public function findById(int $id): ?Company
    {
        return Company::with(['user', 'domains'])->find($id);
    }

    /**
     * Create a new company.
     */
    public function create(array $data): Company
    {
        return DB::transaction(function () use ($data) {
            $domains = $data['domains'] ?? [];
            unset($data['domains']);

            $company = Company::create($data);

            if (! empty($domains)) {
                $this->syncDomains($company, $domains);
            }

            return $company->load(['user', 'domains']);
        });
    }

    /**
     * Update an existing company.
     */
    public function update(Company $company, array $data): Company
    {
        return DB::transaction(function () use ($company, $data) {
            $domains = $data['domains'] ?? null;
            unset($data['domains']);

            $company->update($data);

            if ($domains !== null) {
                $this->syncDomains($company, $domains);
            }

            return $company->load(['user', 'domains']);
        });
    }

    /**
     * Delete a company (soft delete).
     */
    public function delete(Company $company): bool
    {
        return $company->delete();
    }

    /**
     * Restore a soft-deleted company.
     */
    public function restore(Company $company): bool
    {
        return $company->restore();
    }

    /**
     * Permanently delete a company.
     */
    public function forceDelete(Company $company): bool
    {
        return $company->forceDelete();
    }

    /**
     * Sync domains for a company.
     */
    protected function syncDomains(Company $company, array $domains): void
    {
        // Remove existing domains if provided
        if (! empty($domains)) {
            $company->domains()->delete();
        }

        // Ensure only one primary domain - find the first one marked as primary
        $primaryFound = false;
        foreach ($domains as $domainData) {
            if (isset($domainData['primary']) && $domainData['primary'] === true) {
                if ($primaryFound) {
                    // If we already found a primary, mark this one as non-primary
                    $domainData['primary'] = false;
                } else {
                    $primaryFound = true;
                }
            }
        }

        // Create domains
        foreach ($domains as $domainData) {
            $company->domains()->create([
                'domain' => $domainData['domain'] ?? '',
                'primary' => isset($domainData['primary']) && $domainData['primary'] === true,
                'status' => isset($domainData['status']) && $domainData['status'] === true,
            ]);
        }
    }
}
