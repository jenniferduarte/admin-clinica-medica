<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Const Roles
    const SUPERADMIN = 1;
    const ADMIN = 2;
    const DOCTOR = 3;
    const RECEPTIONIST = 4;
    const LABORATORY = 5;
    const PATIENT = 6;

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
