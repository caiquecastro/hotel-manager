<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking
 * @package App
 *
 * @method static Booking findOrFail($id)
 */
class Booking extends Model
{
    protected $fillable = ['customer_id', 'room_id', 'checkin', 'checkout'];
    protected $dates = ['created_at', 'updated_at', 'checkin', 'checkout'];

    public function setCheckinAttribute($value)
    {
        $date = explode('/', $value);
        $this->attributes['checkin'] = \Carbon\Carbon::create($date[2], $date[1], $date[0], 12, 0, 0);
    }

    public function setCheckoutAttribute($value)
    {
        $date = explode('/', $value);
        $this->attributes['checkout'] = \Carbon\Carbon::create($date[2], $date[1], $date[0], 12, 0, 0);
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function consumptions()
    {
        return $this->hasMany(Consumption::class);
    }
}
