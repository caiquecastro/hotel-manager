<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Booking.
 *
 * @method static Booking findOrFail($id)
 */
class Booking extends Model
{
    protected $fillable = ['customer_id', 'room_id', 'checkin', 'checkout', 'price'];
    protected $dates = ['created_at', 'updated_at', 'checkin', 'checkout'];

    public function setCheckinAttribute($value)
    {
        $checkin = null;

        if ($value) {
            $checkin = Carbon::createFromFormat('d/m/Y', $value);
            $checkin->hour = 14;
            $checkin->minute = 0;
            $checkin->second = 0;
        }

        $this->attributes['checkin'] = $checkin;
    }

    public function setCheckoutAttribute($value)
    {
        $checkout = null;

        if ($value) {
            $checkout = Carbon::createFromFormat('d/m/Y', $value);
            $checkout->hour = 12;
            $checkout->minute = 0;
            $checkout->second = 0;
        }

        $this->attributes['checkout'] = $checkout;
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
