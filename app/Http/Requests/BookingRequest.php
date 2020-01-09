<?php

namespace App\Http\Requests;

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
            'price' => 'required',
            'room_id' => 'exists:rooms,id',
            'checkin' => 'date_format:d/m/Y',
            'checkout' => 'date_format:d/m/Y|after:checkin',
        ];
    }
}
