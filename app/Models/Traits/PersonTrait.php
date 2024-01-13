<?php

namespace App\Models\Traits;

use App\Models\Persona\Customer;
use App\Models\Persona\User;
use App\Models\Scopes\CompanyScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait PersonTrait
{
    public function customer(): BelongsTo
    {
        return $this
            ->belongsTo(Customer::class, 'persona_id')
            ->withDefault(fn () => $this->finalConsumer());
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'persona_id');
    }

    public function salesperson(): BelongsTo
    {
        return $this
            ->belongsTo(User::class)
            ->withGlobalScope('company_id', new CompanyScope())
            ->latest('main_subscribe_user')
            ->oldest('name');
    }

    public function client(): BelongsTo
    {
        return $this->customer();
    }

    public function scopeOnlyCreatedByMe(Builder $query): Builder
    {
        return $query
            ->when(! auth()->user()->isAdmin(), function (Builder $query) {
                if (! auth()->user()->isAccountant()) {
                    $query->where('created_by', '=', auth()->id());
                }
            });
    }
}
