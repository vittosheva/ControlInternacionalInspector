<?php

namespace App\Policies;

use App\Models\Inspections\BathroomState;
use App\Models\Persona\User;

class BathroomStatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any BathroomState');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BathroomState $bathroomstate): bool
    {
        return $user->checkPermissionTo('view BathroomState');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create BathroomState');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BathroomState $bathroomstate): bool
    {
        return $user->checkPermissionTo('update BathroomState');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BathroomState $bathroomstate): bool
    {
        return $user->checkPermissionTo('delete BathroomState');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BathroomState $bathroomstate): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BathroomState $bathroomstate): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
