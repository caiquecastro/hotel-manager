<?php

namespace App\Http\Requests;

use App\Rules\ConflictCheckin;

class BookingRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'required',
            'room_id' => 'required|exists:rooms,id',
            'checkin' => [
                'required',
                'date',
                new ConflictCheckin($this->input('room_id'), $this->input('checkout')),
            ],
            'checkout' => 'date|after:checkin',
            'price' => 'required',
        ];
    }
}
