<?php

namespace App\Helpers;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CompanyScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     */
    public function apply(Builder $builder, Model $model): void
    {
        $company = $this->getCompanyFromRequest();

        if ($company) {
            /** @var string $table */
            $table = $model->getTable();
            $builder->where($table . '.company_id', $company->id);
        }
    }

    /**
     * Get the company from the request.
     */
    protected function getCompanyFromRequest(): ?Company
    {
        if (! request() || ! request()->attributes->has('company')) {
            return null;
        }

        return request()->attributes->get('company');
    }
}
