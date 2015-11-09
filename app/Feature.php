<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['name'];

    public function rooms()
    {
        return $this->belongsToMany('App\Room');
    }
}
