<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VideosRecordingsPictures;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoRecordingPicturePolicy
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
        return $user->hasPermissionTo('read videos_recordings_pictures');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VideosRecordingsPictures  $videosRecordingsPictures
     * @return mixed
     */
    public function view(User $user, VideosRecordingsPictures $videosRecordingsPictures)
    {
        return $user->hasPermissionTo('read videos_recordings_pictures');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create videos_recordings_pictures');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VideosRecordingsPictures  $videosRecordingsPictures
     * @return mixed
     */
    public function update(User $user, VideosRecordingsPictures $videosRecordingsPictures)
    {
        return $user->hasPermissionTo('update videos_recordings_pictures');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VideosRecordingsPictures  $videosRecordingsPictures
     * @return mixed
     */
    public function delete(User $user, VideosRecordingsPictures $videosRecordingsPictures)
    {
        return $user->hasPermissionTo('delete videos_recordings_pictures');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VideosRecordingsPictures  $videosRecordingsPictures
     * @return mixed
     */
    public function restore(User $user, VideosRecordingsPictures $videosRecordingsPictures)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\VideosRecordingsPictures  $videosRecordingsPictures
     * @return mixed
     */
    public function forceDelete(User $user, VideosRecordingsPictures $videosRecordingsPictures)
    {
        //
    }
}
