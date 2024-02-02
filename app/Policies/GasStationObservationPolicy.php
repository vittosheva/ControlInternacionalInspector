<?php

namespace App\Policies;

use App\Models\Inspections\GasStationObservation;
use App\Models\Persona\User;

class GasStationObservationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any GasStationObservation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, GasStationObservation $gasstationobservation): bool
    {
        return $user->checkPermissionTo('view GasStationObservation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create GasStationObservation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, GasStationObservation $gasstationobservation): bool
    {
        return $user->checkPermissionTo('update GasStationObservation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, GasStationObservation $gasstationobservation): bool
    {
        return $user->checkPermissionTo('delete GasStationObservation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, GasStationObservation $gasstationobservation): bool
    {
        return $user->checkPermissionTo('{{ restorePermission }}');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, GasStationObservation $gasstationobservation): bool
    {
        return $user->checkPermissionTo('{{ forceDeletePermission }}');
    }
}
