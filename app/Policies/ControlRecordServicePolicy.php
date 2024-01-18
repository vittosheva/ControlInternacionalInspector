<?php

namespace App\Policies;

use App\Models\Inspections\ControlRecordService;
use App\Models\Persona\User;

class ControlRecordServicePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ControlRecordService');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ControlRecordService $controlrecordservice): bool
    {
        return $user->checkPermissionTo('view ControlRecordService');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ControlRecordService');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ControlRecordService $controlrecordservice): bool
    {
        return $user->checkPermissionTo('update ControlRecordService');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ControlRecordService $controlrecordservice): bool
    {
        return $user->checkPermissionTo('delete ControlRecordService');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ControlRecordService $controlrecordservice): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ControlRecordService $controlrecordservice): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
