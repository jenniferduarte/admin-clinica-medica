<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'patient_id', 'doctor_id', 'laboratory_id',
        'show_to_patient','filepath', 'file_original_name'
    ];

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function laboratory()
    {
        return $this->belongsTo('App\Laboratory');
    }

}
