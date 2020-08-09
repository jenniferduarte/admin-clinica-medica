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
        $this->call(UserSeeder::class);
    }
}
