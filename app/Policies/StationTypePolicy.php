<?php

namespace App\Policies;

use App\Models\Inspections\StationType;
use App\Models\Persona\User;

class StationTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any StationType');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StationType $stationtype): bool
    {
        return $user->checkPermissionTo('view StationType');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create StationType');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StationType $stationtype): bool
    {
        return $user->checkPermissionTo('update StationType');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StationType $stationtype): bool
    {
        return $user->checkPermissionTo('delete StationType');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StationType $stationtype): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StationType $stationtype): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
