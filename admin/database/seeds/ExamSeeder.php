<?php

use Illuminate\Database\Seeder;
use App\Exam;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Abdominoscopia'],   
            ['name' => 'Abreugrafia'],
            ['name' => 'Adenograma'],
            ['name' => 'Amostragem'],
            ['name' => 'Análise molecular para a síndrome do X frágil'],
            ['name' => 'Antibiograma'],
            ['name' => 'Anuscopia'],
            ['name' => 'Biópsia'],
            ['name' => 'Calcemia'],
            ['name' => 'Capnometria'],
            ['name' => 'Carga viral'],
            ['name' => 'Cartão de Guthrie'],
            ['name' => 'Cateterismo'],
            ['name' => 'Cistocentese'],
            ['name' => 'Citometria de fluxo'],
            ['name' => 'Coagulograma'],
            ['name' => 'Colonoscopia'],
            ['name' => 'Coloração diferencial'],
            ['name' => 'Corante Sudan'],
            ['name' => 'Culdoscopia'],
            ['name' => 'CURB-65']
        ];

        Exam::insert($data);
    }
}
