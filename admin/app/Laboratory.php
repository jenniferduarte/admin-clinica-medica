<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laboratory extends Model
{
    use Notifiable, SoftDeletes;

    protected $table = 'laboratories';

    protected $fillable = ['name', 'email', 'phone', 'cnpj', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function result()
    {
        return $this->hasMany('App\Result');
    }
}
