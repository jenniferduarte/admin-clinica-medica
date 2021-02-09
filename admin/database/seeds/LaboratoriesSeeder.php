<?php

use Illuminate\Database\Seeder;

class LaboratoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laboratories')->insert([
            'name' => 'Tommasi',
            'email' => 'tommasi@vidasaude.com',
            'user_id' => '12',
            'phone' => '27954788956'
        ]);

        DB::table('laboratories')->insert([
            'name' => 'Pretti',
            'email' => 'pretti@vidasaude.com',
            'user_id' => '13',
            'phone' => '27954787788',
            'cnpj' => '12312312312312'
        ]);

        DB::table('laboratories')->insert([
            'name' => 'Laboratório PAT',
            'email' => 'pat@vidasaude.com',
            'user_id' => '14',
            'phone' => '27951188978'
        ]);

        DB::table('laboratories')->insert([
            'name' => 'Laboratório Bioclínico',
            'email' => 'bioclinico@vidasaude.com',
            'user_id' => '15',
            'phone' => '27988954756',
            'cnpj' => '22554546987974'
        ]);

    }
}
