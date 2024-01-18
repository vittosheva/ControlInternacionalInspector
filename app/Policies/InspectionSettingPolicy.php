<?php

namespace App\Policies;

use App\Models\Inspections\InspectionSetting;
use App\Models\Persona\User;

class InspectionSettingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any InspectionSetting');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, InspectionSetting $inspectionsetting): bool
    {
        return $user->checkPermissionTo('view InspectionSetting');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create InspectionSetting');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, InspectionSetting $inspectionsetting): bool
    {
        return $user->checkPermissionTo('update InspectionSetting');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, InspectionSetting $inspectionsetting): bool
    {
        return $user->checkPermissionTo('delete InspectionSetting');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, InspectionSetting $inspectionsetting): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, InspectionSetting $inspectionsetting): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
