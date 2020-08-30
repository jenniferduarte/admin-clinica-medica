<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = ['description', 'record_id'];

    public function record()
    {
        $this->belongsTo('App\Record');
    }

    public function medicaments()
    {
        return $this->belongsToMany('App\Medicament', 'prescription_medicaments');
    }
}
