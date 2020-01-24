<?php

use App\Type;
use App\Room;
use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomTypeId = Type::first()->id;

        Room::create([
            'number' => '01',
            'floor' => 'ground',
            'type_id' => $roomTypeId,
        ]);

        Room::create([
            'number' => '02',
            'floor' => 'ground',
            'type_id' => $roomTypeId,
        ]);

        Room::create([
            'number' => '03',
            'floor' => 'ground',
            'type_id' => $roomTypeId,
        ]);

        Room::create([
            'number' => '04',
            'floor' => 'ground',
            'type_id' => $roomTypeId,
        ]);

        Room::create([
            'number' => '05',
            'floor' => 'ground',
            'type_id' => $roomTypeId,
        ]);

        Room::create([
            'number' => '06',
            'floor' => 'ground',
            'type_id' => $roomTypeId,
        ]);
    }
}
