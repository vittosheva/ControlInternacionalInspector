<?php

namespace App\Policies;

use App\Models\Inspections\BathroomComplianceObservation;
use App\Models\Persona\User;

class BathroomComplianceObservationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any BathroomComplianceObservation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, BathroomComplianceObservation $bathroomcomplianceobservation): bool
    {
        return $user->checkPermissionTo('view BathroomComplianceObservation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create BathroomComplianceObservation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, BathroomComplianceObservation $bathroomcomplianceobservation): bool
    {
        return $user->checkPermissionTo('update BathroomComplianceObservation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, BathroomComplianceObservation $bathroomcomplianceobservation): bool
    {
        return $user->checkPermissionTo('delete BathroomComplianceObservation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, BathroomComplianceObservation $bathroomcomplianceobservation): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, BathroomComplianceObservation $bathroomcomplianceobservation): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
