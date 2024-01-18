<?php

namespace App\Policies;

use App\Models\Inspections\ControlRecord;
use App\Models\Persona\User;

class ControlRecordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ControlRecord');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ControlRecord $controlrecord): bool
    {
        return $user->checkPermissionTo('view ControlRecord');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ControlRecord');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ControlRecord $controlrecord): bool
    {
        return $user->checkPermissionTo('update ControlRecord');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ControlRecord $controlrecord): bool
    {
        return $user->checkPermissionTo('delete ControlRecord');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ControlRecord $controlrecord): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ControlRecord $controlrecord): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
