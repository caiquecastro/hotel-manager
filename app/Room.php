<?php

namespace App;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use GeneratesUuid;

    protected $fillable = ['number', 'floor', 'type_id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function getStatusAttribute($value)
    {
        $now = now();
        $hasBooking = $this->bookings()
            ->where('checkin', '<=', $now)
            ->where('checkout', '>=', $now)
            ->count();

        return $hasBooking ? 'occupied' : $value;
    }

    public function features()
    {
        return $this->belongsToMany('App\Feature');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    public function bookingsFor($date)
    {
        return $this->bookings->first(function ($value) use ($date) {
            return $value->checkin <= $date && $value->checkout > $date;
        });
    }
}
