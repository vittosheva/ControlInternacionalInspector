<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CompanyScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (! auth()->check() || auth()->user()->getAttributeValue('is_super')) {
            return;
        }

        if (blank(filament()->getTenant())) {
            return;
        }

        $builder->where($model->qualifyColumn('company_id'), '=', filament()->getTenant()->getAttributeValue('id'));
    }
}
