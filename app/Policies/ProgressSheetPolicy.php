<?php

namespace App\Policies;

use App\Models\ProgressSheet;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgressSheetPolicy
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
        return $user->hasPermissionTo('read progress_sheets');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProgressSheet  $progressSheet
     * @return mixed
     */
    public function view(User $user, ProgressSheet $progressSheet)
    {
        if( $user->is_super_admin() || $user->is_admin() ) {
            return true;
        }

        return $user->hasPermissionTo('read progress_sheets') && $user->id === $progressSheet->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create progress_sheets');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProgressSheet  $progressSheet
     * @return mixed
     */
    public function update(User $user, ProgressSheet $progressSheet)
    {
        return $user->hasPermissionTo('update progress_sheets');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProgressSheet  $progressSheet
     * @return mixed
     */
    public function delete(User $user, ProgressSheet $progressSheet)
    {
        return $user->hasPermissionTo('delete progress_sheets');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProgressSheet  $progressSheet
     * @return mixed
     */
    public function restore(User $user, ProgressSheet $progressSheet)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProgressSheet  $progressSheet
     * @return mixed
     */
    public function forceDelete(User $user, ProgressSheet $progressSheet)
    {
        //
    }
}
