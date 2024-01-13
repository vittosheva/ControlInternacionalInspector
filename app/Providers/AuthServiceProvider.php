<?php

namespace App\Providers;

use App\Models\Persona\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Super Admin grants
        Gate::before(function (User $user) {
            return $user->getAttributeValue('is_super') && $user->isSuperAdmin() ? true : null;
        });
    }
}
