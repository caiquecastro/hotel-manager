<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['customer_id', 'room_id', 'checkin', 'checkout'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
