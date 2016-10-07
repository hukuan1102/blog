<?php

namespace App\Policies;

use App\User;
use App\music;
use Illuminate\Auth\Access\HandlesAuthorization;

class MusicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the music.
     *
     * @param  App\User  $user
     * @param  App\music  $music
     * @return mixed
     */
    public function view(User $user, music $music)
    {
        //
    }

    /**
     * Determine whether the user can create musics.
     *
     * @param  App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the music.
     *
     * @param  App\User  $user
     * @param  App\music  $music
     * @return mixed
     */
    public function update(User $user, music $music)
    {
        //
         return $user->id === $music->admin_id;
       
    }

    /**
     * Determine whether the user can delete the music.
     *
     * @param  App\User  $user
     * @param  App\music  $music
     * @return mixed
     */
    public function delete(User $user, music $music)
    {
        //
    }
}
