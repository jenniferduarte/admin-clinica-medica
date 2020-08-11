<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [ 
        'user_id', 'name', 'social_name', 'mother_name', 
        'father_name', 'observation', 'responsible_name', 'responsible_phone'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
