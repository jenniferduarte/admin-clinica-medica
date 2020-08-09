<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicament extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['factory_name', 'generic_name', 'manufacturer', 'active'];
}
