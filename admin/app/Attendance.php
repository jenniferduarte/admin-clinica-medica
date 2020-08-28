<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['patient_id', 'doctor_id', 'schedule_id', 'status_id', 'clinic_id'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function schedule()
    {
        return $this->belongsTo('App\Schedule');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

}
