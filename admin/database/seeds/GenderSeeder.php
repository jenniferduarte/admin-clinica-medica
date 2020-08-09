<?php

use Illuminate\Database\Seeder;
use App\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Female'],
            ['name' => 'Male'],
            ['name' => 'Other']
        ];

        Gender::insert($data);
    }
}
