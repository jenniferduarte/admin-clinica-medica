<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{

    public function prescriptions()
    {
        return $this->belongsToMany('App\Prescription', 'prescription_medicaments');
    }
}
