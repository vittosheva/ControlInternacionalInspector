<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CreatedByMeScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $builder
            ->when(! auth()->user()->isAdmin(), function (Builder $query) {
                if (! auth()->user()->isAccountant()) {
                    $query->where('created_by', '=', auth()->id());
                }
            });
    }
}
