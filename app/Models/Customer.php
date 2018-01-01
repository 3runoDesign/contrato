<?php

namespace CONTR\Models;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements TableInterface
{
    protected $fillable = [
        'name',
        'cpf',
        'rg',
        'gender',
        'email',
        'phone',

        'cep',
        'address',
        'building_number',
        'complement',
        'district',
        'city',
        'uf',
        'birthday',
        'description',
    ];

    protected $dates = [
        'birthday'
    ];

    public function agreements() {
        return $this->hasMany(Agreement::class);
    }

    public function get_gender_formatted() {
        return (($this->gender == 1) ? "Homem" : "Mulher");
    }

    public function getTableHeaders()
    {
        return [
            'ID',
            'Nome',
            'Email',
            'Cidade'
        ];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'Email':
                return $this->email;
            case 'Cidade':
                return $this->city . '-' . $this->uf;
        }
    }
}
