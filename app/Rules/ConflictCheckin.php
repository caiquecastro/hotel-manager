<?php

namespace App\Rules;

use App\Booking;
use Illuminate\Contracts\Validation\Rule;

class ConflictCheckin implements Rule
{
    private $roomId;

    private $checkout;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($roomId, $checkout)
    {
        $this->roomId = $roomId;
        $this->checkout = $checkout;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $values = $attribute === 'checkin' ? [$value, $this->checkout] : [$this->checkout, $value];
        $query = Booking::where('room_id', $this->roomId)
            ->whereBetween($attribute, $values);

        return $query->first() === null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Existe uma reserva no quarto conflitante com a data';
    }
}
