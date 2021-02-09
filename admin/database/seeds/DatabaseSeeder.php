<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(ClinicSeeder::class);
        $this->call(ExamSeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(DoctorSpecialtySeeder::class);
        $this->call(PatientSeeder::class);
        $this->call(LaboratoriesSeeder::class);
    }
}
