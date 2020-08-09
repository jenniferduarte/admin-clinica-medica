<?php

use Illuminate\Database\Seeder;
use App\Clinic;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            ['name' => 'Clínica Saúde +', 'cnpj' => '35210646000188'],
            ['name' => 'Clínica do Amigo', 'cnpj' => '79429090000190'],
            ['name' => 'Família Saúde', 'cnpj' => '86529907000168']
        ];

        Clinic::insert($data);
    }
}
