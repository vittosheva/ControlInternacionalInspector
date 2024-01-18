<?php

namespace App\Policies;

use App\Models\Inspections\ControlRecordEnvironmental;
use App\Models\Persona\User;

class ControlRecordEnvironmentalPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ControlRecordEnvironmental');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ControlRecordEnvironmental $controlrecordenvironmental): bool
    {
        return $user->checkPermissionTo('view ControlRecordEnvironmental');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ControlRecordEnvironmental');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ControlRecordEnvironmental $controlrecordenvironmental): bool
    {
        return $user->checkPermissionTo('update ControlRecordEnvironmental');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ControlRecordEnvironmental $controlrecordenvironmental): bool
    {
        return $user->checkPermissionTo('delete ControlRecordEnvironmental');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ControlRecordEnvironmental $controlrecordenvironmental): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ControlRecordEnvironmental $controlrecordenvironmental): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
