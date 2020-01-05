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
    protected $fillable = ['customer_id', 'room_id', 'checkin', 'checkout'];
    protected $dates = ['created_at', 'updated_at', 'checkin', 'checkout'];

    public function setCheckinAttribute($value)
    {
        $this->attributes['checkin'] = $value ? Carbon::createFromFormat('d/m/Y', $value) : null;
    }

    public function setCheckoutAttribute($value)
    {
        $this->attributes['checkout'] = $value ? Carbon::createFromFormat('d/m/Y', $value) : null;
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
