<?php

namespace Database\Factories;

use App\Room;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => '1',
            'floor' => 'ground',
            'type_id' => function () {
                return \App\Type::factory()->create()->id;
            },
        ];
    }
}
