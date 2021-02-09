<?php

use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
            'id' => '1',
            'user_id' => '3',
            'crm' => '125788',
        ]);

        DB::table('doctors')->insert([
            'id' => '2',
            'user_id' => '4',
            'crm' => '125788',
        ]);

        DB::table('doctors')->insert([
            'id' => '3',
            'user_id' => '5',
            'crm' => '125788',
        ]);

        DB::table('doctors')->insert([
            'id' => '4',
            'user_id' => '6',
            'crm' => '125788',
        ]);

        DB::table('doctors')->insert([
            'id' => '5',
            'user_id' => '7',
            'crm' => '125788',
        ]);

        DB::table('doctors')->insert([
            'id' => '6',
            'user_id' => '8',
            'crm' => '125788',
        ]);
    }
}
