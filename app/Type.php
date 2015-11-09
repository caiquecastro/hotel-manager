<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name', 'price'];

    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
