<?php

namespace App\Policies;

use App\Models\Inspections\HoseType;
use App\Models\Persona\User;

class HoseTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any HoseType');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, HoseType $hosetype): bool
    {
        return $user->checkPermissionTo('view HoseType');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create HoseType');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, HoseType $hosetype): bool
    {
        return $user->checkPermissionTo('update HoseType');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, HoseType $hosetype): bool
    {
        return $user->checkPermissionTo('delete HoseType');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, HoseType $hosetype): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, HoseType $hosetype): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
