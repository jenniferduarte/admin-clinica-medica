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
            ['name' => 'Genética médica'],
            ['name' => 'Geriatria'],
            ['name' => 'Ginecologia e obstetrícia'],
            ['name' => 'Hematologia e Hemoterapia'],
            ['name' => 'Homeopatia'],
            ['name' => 'Infectologia'],
            ['name' => 'Mastologia'],
            ['name' => 'Medicina de Família e Comunidade'],
            ['name' => 'Medicina de Emergência'] ,
            ['name' => 'Medicina do Trabalho'],
            ['name' => 'Medicina do Tráfego'] ,
            ['name' => 'Medicina Esportiva'] ,
            ['name' => 'Medicina Física e Reabilitação'],
            ['name' => 'Medicina Intensiva'],
            ['name' => 'Medicina Legal e Perícia Médica'],
            ['name' => 'Medicina Nuclear'],
            ['name' => 'Medicina Preventiva e Social'],
            ['name' => 'Nefrologia'],
            ['name' => 'Neurocirurgia'],
            ['name' => 'Neurologia'],
            ['name' => 'Nutrologia'],
            ['name' => 'Obstetrícia'],
            ['name' => 'Oftalmologia'],
            ['name' => 'Ortopedia e Traumatologia'],
            ['name' => 'Otorrinolaringologia'],
            ['name' => 'Patologia'] ,
            ['name' => 'Patologia Clínica/Medicina laboratorial'],
            ['name' => 'Pediatria'],
            ['name' => 'Pneumologia'],
            ['name' => 'Psiquiatria'],
            ['name' => 'Radiologia e Diagnóstico por Imagem'],
            ['name' => 'Radioterapia'],
            ['name' => 'Reumatologia '],
            ['name' => 'Toxicologia médica'],
            ['name' => 'Urologia'],
        ];

        Specialty::insert($data);
    }
}
