<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'consultation_time', 'start_date', 'end_date', 'doctor_id', 'clinic_id'
    ];

    protected $dates = ['start_date', 'end_date'];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function clinic()
    {
        return $this->belongsTo('App\Clinic');
    }

    public function attendance()
    {
        return $this->hasOne('App\Attendance');
    }
}
