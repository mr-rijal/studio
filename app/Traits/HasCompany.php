<?php

namespace App\Traits;

use App\Helpers\CompanyScope;
use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasCompany
{
    /**
     * Boot the trait.
     */
    protected static function bootHasCompany(): void
    {
        // Add global scope to filter by company_id
        static::addGlobalScope(new CompanyScope);

        // Automatically set company_id when creating
        static::creating(function (Model $model) {
            if (! $model->company_id && $company = static::getCompanyFromRequest()) {
                $model->company_id = $company->id;
            }
        });

        // Automatically set company_id when updating (if not already set) and validate it matches
        static::updating(function (Model $model) {
            $company = static::getCompanyFromRequest();

            if ($company) {
                // If company_id is not set, set it
                if (! $model->company_id) {
                    $model->company_id = $company->id;
                }
                // If company_id is being changed, ensure it matches the request company
                elseif ($model->isDirty('company_id') && $model->company_id !== $company->id) {
                    abort(403, 'Unauthorized: Cannot change company_id to a different company.');
                }
                // If company_id exists but doesn't match, prevent update
                elseif ($model->getOriginal('company_id') && $model->getOriginal('company_id') !== $company->id) {
                    abort(403, 'Unauthorized: Cannot update resource from different company.');
                }
            }
        });

        // Ensure company_id matches on deletion
        static::deleting(function (Model $model) {
            if ($company = static::getCompanyFromRequest()) {
                if ($model->company_id !== $company->id) {
                    abort(403, 'Unauthorized: Cannot delete resource from different company.');
                }
            }
        });
    }

    /**
     * Get the company from the request.
     */
    protected static function getCompanyFromRequest(): ?Company
    {
        if (! request() || ! request()->attributes->has('company')) {
            return null;
        }

        return request()->attributes->get('company');
    }

    /**
     * Get the company that owns the model.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    /**
     * Scope a query to ignore the company filter (use with caution).
     */
    public function scopeWithoutCompanyFilter(Builder $query): Builder
    {
        return $query->withoutGlobalScope(CompanyScope::class);
    }
}
