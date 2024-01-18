<?php

namespace App\Policies;

use App\Models\Inspections\Hose;
use App\Models\Persona\User;

class HosePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Hose');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Hose $hose): bool
    {
        return $user->checkPermissionTo('view Hose');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Hose');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Hose $hose): bool
    {
        return $user->checkPermissionTo('update Hose');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Hose $hose): bool
    {
        return $user->checkPermissionTo('delete Hose');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Hose $hose): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Hose $hose): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
