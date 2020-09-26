<?php

namespace Database\Factories;

use App\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => function () {
                return \App\Customer::factory()->create()->id;
            },
            'room_id' => function () {
                return \App\Room::factory()->create()->id;
            },
            'checkin' => '2019-03-03',
            'checkout' => '2019-03-30',
            'price' => 100,
        ];
    }
}
