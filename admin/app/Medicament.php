<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicament extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['factory_name', 'generic_name', 'manufacturer', 'active'];

    public function prescriptions()
    {
        return $this->belongsToMany('App\Prescription', 'prescription_medicaments');
    }
}
