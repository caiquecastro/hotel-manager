<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['number', 'floor'];

    public function features()
    {
        return $this->belongsToMany('App\Feature');
    }
}
