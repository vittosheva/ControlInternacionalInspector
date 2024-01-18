<?php

namespace App\Policies;

use App\Models\Inspections\EnvironmentalObservation;
use App\Models\Persona\User;

class EnvironmentalObservationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any EnvironmentalObservation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EnvironmentalObservation $environmentalobservation): bool
    {
        return $user->checkPermissionTo('view EnvironmentalObservation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create EnvironmentalObservation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EnvironmentalObservation $environmentalobservation): bool
    {
        return $user->checkPermissionTo('update EnvironmentalObservation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EnvironmentalObservation $environmentalobservation): bool
    {
        return $user->checkPermissionTo('delete EnvironmentalObservation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EnvironmentalObservation $environmentalobservation): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EnvironmentalObservation $environmentalobservation): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
