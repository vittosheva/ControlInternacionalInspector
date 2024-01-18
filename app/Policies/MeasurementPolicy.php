<?php

namespace App\Policies;

use App\Models\Inspections\Measurement;
use App\Models\Persona\User;

class MeasurementPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Measurement');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Measurement $measurement): bool
    {
        return $user->checkPermissionTo('view Measurement');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Measurement');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Measurement $measurement): bool
    {
        return $user->checkPermissionTo('update Measurement');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Measurement $measurement): bool
    {
        return $user->checkPermissionTo('delete Measurement');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Measurement $measurement): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Measurement $measurement): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
