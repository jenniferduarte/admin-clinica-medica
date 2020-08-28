<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Record extends Model
{
    protected $fillable = [ 
        'anamnesis', 'family_history', 'treatment_plan', 'history_id', 'doctor_id',
        'diagnostic_conclusion', 'weight', 'height', 'heart_rate', 'respiratory_frequency',
        'systolic_bp', 'diastolic_bp', 'temperature', 'allergy', 'chronic_diseases',
        'hypertension', 'diabetes', 'smoker', 'drug_user', 'expected_return'
    ];

    public function history()
    {
        return $this->belongsTo('App\History');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Doctor');
    }

    public function prescriptions()
    {
        return $this->hasMany('App\Prescription');
    }

    public function setWeightAttribute($value)
    {
        if($value != null){
            $this->attributes['weight'] = str_replace(',', '.', $value);
        }   
    }

    public function setTemperatureAttribute($value)
    {
        if($value != null){
            $this->attributes['temperature'] = str_replace(',', '.', $value);
        }
    }

    public function setExpectedReturnAttribute($value)
    {
        $this->attributes['expected_return'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
}
