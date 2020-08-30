<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicament extends Model
{
    protected $fillable = ['prescription_id', 'medicament_id', 'dosage'];

}
