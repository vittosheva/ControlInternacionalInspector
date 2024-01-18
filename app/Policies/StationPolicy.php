<?php

namespace App\Policies;

use App\Models\Inspections\Station;
use App\Models\Persona\User;

class StationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Station');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Station $station): bool
    {
        return $user->checkPermissionTo('view Station');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Station');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Station $station): bool
    {
        return $user->checkPermissionTo('update Station');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Station $station): bool
    {
        return $user->checkPermissionTo('delete Station');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Station $station): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Station $station): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
