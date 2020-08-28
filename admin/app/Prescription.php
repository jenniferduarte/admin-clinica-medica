<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ['description', 'record_id', 'expiration_date'];

    public function record()
    {
        $this->belongsTo('App\Record');
    }
}
