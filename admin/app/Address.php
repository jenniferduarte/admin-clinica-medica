<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'street', 'number', 'district', 'complement', 'state',
        'country','cep','city','active','responsible_type','responsible_id'
    ];

    public function responsible()
    {
        return $this->morphTo();
    }

}
