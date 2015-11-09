<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalPerson extends Model
{
    protected $fillable = ['cnpj'];

    public function customer()
    {
        return $this->morphOne('App\Customer', 'person');
    }
}
