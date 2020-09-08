<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescriptionExam extends Model
{
    protected $fillable = ['prescription_id', 'exam_id'];
}
