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
}
