<?php

use Illuminate\Database\Seeder;

class DoctorSpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctor_specialties')->insert([
            'doctor_id' => '1',
            'specialty_id' => '1'
        ]);

        DB::table('doctor_specialties')->insert([
            'doctor_id' => '2',
            'specialty_id' => '2'
        ]);

        DB::table('doctor_specialties')->insert([
            'doctor_id' => '3',
            'specialty_id' => '3'
        ]);

        DB::table('doctor_specialties')->insert([
            'doctor_id' => '4',
            'specialty_id' => '3'
        ]);

        DB::table('doctor_specialties')->insert([
            'doctor_id' => '5',
            'specialty_id' => '5'
        ]);

        DB::table('doctor_specialties')->insert([
            'doctor_id' => '5',
            'specialty_id' => '6'
        ]);

        DB::table('doctor_specialties')->insert([
            'doctor_id' => '6',
            'specialty_id' => '1'
        ]);

        DB::table('doctor_specialties')->insert([
            'doctor_id' => '6',
            'specialty_id' => '2'
        ]);
    }
}
