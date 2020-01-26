<?php

namespace App;

use Carbon\Carbon;
use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use FormAccessible, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'zipcode',
        'birthdate',
        'job_title',
        'document_number',
        'car_plate',
    ];

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = $value ? Carbon::createFromFormat('d/m/Y', $value) : null;
    }

    public function getBirthdateAttribute($value)
    {
        return Carbon::parse($value)->format('m/d/Y');
    }

    /**
     * Get the customer's birthdate for forms.
     *
     * @param  string  $value
     * @return string
     */
    public function formBirthdateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function activeBooking()
    {
        return $this->hasOne(Booking::class)
            ->whereNotNull('checkin_at')
            ->whereNull('checkout_at');
    }
}
