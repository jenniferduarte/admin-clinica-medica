<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    //Const Roles
    const EXAM = 'exam';
    const MEDICAMENT = 'medicament';

    protected $fillable = ['description', 'record_id', 'type'];

    public function record()
    {
        return $this->belongsTo('App\Record');
    }

    public function medicaments()
    {
        return $this->belongsToMany('App\Medicament', 'prescription_medicaments');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Exam', 'prescription_exams');
    }
}
