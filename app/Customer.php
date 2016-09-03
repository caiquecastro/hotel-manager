<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'phone', 'address'];

    public function person()
    {
        return $this->morphTo();
    }

    public function getCpfAttribute()
    {
        return $this->person->cpf;
    }

    public function getGenderAttribute()
    {
        return $this->person->gender;
    }

    public function getCnpjAttribute()
    {
        return $this->person->cnpj;
    }

    public function getBirthdayAttribute()
    {
        return $this->person->birthday;
    }
}
