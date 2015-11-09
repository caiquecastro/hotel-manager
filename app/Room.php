<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['number', 'floor', 'type_id'];

    public function features()
    {
        return $this->belongsToMany('App\Feature');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
