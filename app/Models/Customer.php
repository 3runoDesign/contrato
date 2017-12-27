<?php

namespace CONTR\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'address',
        'building_number',
        'district',
        'locality',
        'uf',
        'cpf',
        'rg',
        'phone'
    ];

    public function agreements() {
        return $this->hasMany(Agreement::class);
    }
}
