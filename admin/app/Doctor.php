<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes; 
    
    protected $fillable = ['user_id', 'crm'];

    protected $with = ['specialties'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function specialties()
    {
        return $this->belongsToMany('App\Specialty', 'doctor_specialties')->withTimestamps();
    }

    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    # Função que retorna o tratamento do médico de acordo com seu sexo
    public function getTreatmentAttribute()
    {        
        if($this->user->gender_id == 1){
            return 'Dra.';
        }
        
        return 'Dr.';
    }
}
