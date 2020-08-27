<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'scheduled'],
            ['id' => 2, 'name' => 'confirmed'],
            ['id' => 3, 'name' => 'absent_patient'],
            ['id' => 4, 'name' => 'canceled'],
            ['id' => 5, 'name' => 'finished'],
        ];

        Status::insert($data);
    }
}
