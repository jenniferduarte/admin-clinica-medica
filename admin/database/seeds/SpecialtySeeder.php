<?php

use App\Specialty;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Alergia e Imunologia'],
            ['name' => 'Anestesiologia'],
            ['name' => 'Angiologia'],
            ['name' => 'Oncologia'],
            ['name' => 'Cardiologia'],
            ['name' => 'Cirurgia Cardiovascular'],
            ['name' => 'Cirurgia da Mão'],
            ['name' => 'Cirurgia de cabeça e pescoço'],
            ['name' => 'Cirurgia do Aparelho Digestivo'],
            ['name' => 'Cirurgia Geral'],
            ['name' => 'Cirurgia Pediátrica'],
            ['name' => 'Cirurgia Plástica'],
            ['name' => 'Cirurgia Torácica'],
            ['name' => 'Cirurgia Vascular'],
            ['name' => 'Clínica Médica '],
            ['name' => 'Coloproctologia'],
            ['name' => 'Dermatologia'],
            ['name' => 'Endocrinologia e Metabologia'],
            ['name' => 'Endoscopia'],
            ['name' => 'Gastroenterologia'],
            ['name' => 'Genética médica']
        ];

        Specialty::insert($data);
    }
}
