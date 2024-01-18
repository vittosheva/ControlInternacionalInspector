<?php

namespace App\Policies;

use App\Models\Inspections\ControlRecordBathroom;
use App\Models\Persona\User;

class ControlRecordBathroomPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ControlRecordBathroom');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ControlRecordBathroom $controlrecordbathroom): bool
    {
        return $user->checkPermissionTo('view ControlRecordBathroom');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ControlRecordBathroom');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ControlRecordBathroom $controlrecordbathroom): bool
    {
        return $user->checkPermissionTo('update ControlRecordBathroom');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ControlRecordBathroom $controlrecordbathroom): bool
    {
        return $user->checkPermissionTo('delete ControlRecordBathroom');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ControlRecordBathroom $controlrecordbathroom): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ControlRecordBathroom $controlrecordbathroom): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
