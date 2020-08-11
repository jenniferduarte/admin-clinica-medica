<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    private $with = ['user_id', 'crm'];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
