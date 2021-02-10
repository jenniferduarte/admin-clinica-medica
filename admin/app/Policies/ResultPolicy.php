<?php

namespace App\Policies;

use App\Result;
use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResultPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */


    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Result  $result
     * @return mixed
     */
    public function view(User $user, Result $result)
    {
        if($user->id === $result->patient->user_id && $result->show_to_patient == 1){
            return true;
        }

        if($user->id === $result->doctor->user_id || $user->id === $result->laboratory->user_id){
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_id === Role::LABORATORY;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Result  $result
     * @return mixed
     */
    public function update(User $user, Result $result)
    {
        return $user->id === $result->doctor->user_id || $user->id === $result->laboratory->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Result  $result
     * @return mixed
     */
    public function delete(User $user, Result $result)
    {
        return $user->id === $result->laboratory->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Result  $result
     * @return mixed
     */
    public function restore(User $user, Result $result)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Result  $result
     * @return mixed
     */
    public function forceDelete(User $user, Result $result)
    {
        //
    }
}
