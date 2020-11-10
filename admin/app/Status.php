<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const SCHEDULED = 1;
    const CANCELED = 2;
    const ABSENT_PATIENT = 3;

    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }
}
