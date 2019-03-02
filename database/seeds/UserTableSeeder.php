<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Caique de Castro',
            'email' => 'castro.caique@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
