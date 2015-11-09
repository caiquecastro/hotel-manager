<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NaturalPerson extends Model
{
    protected $fillable = ['cpf', 'birthday', 'gender'];

    public function customer()
    {
        return $this->morphOne('App\Customer', 'person');
    }
}
