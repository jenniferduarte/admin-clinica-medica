<?php

namespace App\Policies;

use App\Attendance;
use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttendancePolicy
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
        return $user->role->id === Role::DOCTOR || $user->role->id === Role::PATIENT || $user->role->id === Role::RECEPTIONIST;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Attendance  $attendance
     * @return mixed
     */
    public function view(User $user, Attendance $attendance)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Attendance  $attendance
     * @return mixed
     */
    public function update(User $user, Attendance $attendance)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Attendance  $attendance
     * @return mixed
     */
    public function delete(User $user, Attendance $attendance)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Attendance  $attendance
     * @return mixed
     */
    public function restore(User $user, Attendance $attendance)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Attendance  $attendance
     * @return mixed
     */
    public function forceDelete(User $user, Attendance $attendance)
    {
        //
    }
}
