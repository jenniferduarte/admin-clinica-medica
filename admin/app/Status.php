<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    const SCHEDULED = 1;
    const CONFIRMED = 2;
    const ABSENT_PATIENT = 3;
    const RESCHEDULED = 4;
    const CANCELED = 5;
    const FINISHED = 6;
    
    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }
}
