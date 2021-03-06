<?php

namespace App\Policies;

use App\Medicament;
use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicamentPolicy
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
        return $user->role_id === Role::ADMIN;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Medicament  $medicament
     * @return mixed
     */
    public function view(User $user, Medicament $medicament)
    {
        return $user->role_id === Role::ADMIN;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_id === Role::ADMIN;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Medicament  $medicament
     * @return mixed
     */
    public function update(User $user, Medicament $medicament)
    {
        return $user->role_id === Role::ADMIN;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Medicament  $medicament
     * @return mixed
     */
    public function delete(User $user, Medicament $medicament)
    {
        return $user->role_id === Role::ADMIN;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Medicament  $medicament
     * @return mixed
     */
    public function restore(User $user, Medicament $medicament)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Medicament  $medicament
     * @return mixed
     */
    public function forceDelete(User $user, Medicament $medicament)
    {
        //
    }
}
