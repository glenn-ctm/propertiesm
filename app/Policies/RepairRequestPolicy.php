<?php

namespace App\Policies;

use App\Models\RepairRequest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepairRequestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('read repair_requests');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RepairRequest  $repairRequest
     * @return mixed
     */
    public function view(User $user, RepairRequest $repairRequest)
    {
        if( $user->is_super_admin() || $user->is_admin() ) {
            return true;
        }
        if( $user->hasPermissionTo('read repair_requests') ) {
            return $user->id === $repairRequest->user_id;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create repair_requests');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RepairRequest  $repairRequest
     * @return mixed
     */
    public function update(User $user, RepairRequest $repairRequest)
    {
        return $user->hasPermissionTo('update repair_requests');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RepairRequest  $repairRequest
     * @return mixed
     */
    public function delete(User $user, RepairRequest $repairRequest)
    {
        return $user->hasPermissionTo('delete repair_requests');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RepairRequest  $repairRequest
     * @return mixed
     */
    public function restore(User $user, RepairRequest $repairRequest)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RepairRequest  $repairRequest
     * @return mixed
     */
    public function forceDelete(User $user, RepairRequest $repairRequest)
    {
        return false;
    }
}
