<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'name', 'social_name', 'mother_name',
        'father_name', 'observation', 'responsible_name', 'responsible_phone'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function attendances()
    {
        return $this->hasMany('App\Attendance');
    }

    public function history()
    {
        return $this->belongsTo('App\History');
    }

    public function result()
    {
        return $this->hasMany('App\Result');
    }
}
