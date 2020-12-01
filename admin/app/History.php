<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = ['patient_id'];

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }

    public function records()
    {
        return $this->hasMany('App\Record');
    }
}
