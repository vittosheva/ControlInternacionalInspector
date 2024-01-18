<?php

namespace App\Policies;

use App\Models\Inspections\ControlRecordDetail;
use App\Models\Persona\User;

class ControlRecordDetailPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ControlRecordDetail');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ControlRecordDetail $controlrecorddetail): bool
    {
        return $user->checkPermissionTo('view ControlRecordDetail');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ControlRecordDetail');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ControlRecordDetail $controlrecorddetail): bool
    {
        return $user->checkPermissionTo('update ControlRecordDetail');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ControlRecordDetail $controlrecorddetail): bool
    {
        return $user->checkPermissionTo('delete ControlRecordDetail');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ControlRecordDetail $controlrecorddetail): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ControlRecordDetail $controlrecorddetail): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
