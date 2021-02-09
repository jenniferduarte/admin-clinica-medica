<?php

use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'id' => '1',
            'user_id' => '16',
            'social_name' => '',
            'mother_name' => 'Paula Souza',
            'father_name' => 'Lucas Moreira',
            'observation' => 'Alergia a aspirina',
            'responsible_name' => 'Maria Lourdes',
            'responsible_phone' => '27984564545'
        ]);

        DB::table('patients')->insert([
            'id' => '2',
            'user_id' => '17',
            'social_name' => 'Marta Ribeiro',
            'mother_name' => 'Natalia Ribeiro',
            'father_name' => '',
            'observation' => '',
            'responsible_name' => '',
            'responsible_phone' => ''
        ]);

        DB::table('patients')->insert([
            'id' => '3',
            'user_id' => '18',
            'social_name' => '',
            'mother_name' => 'Ana Claudia',
            'father_name' => 'Pedro Caetano',
            'observation' => '',
            'responsible_name' => '',
            'responsible_phone' => ''
        ]);

        DB::table('patients')->insert([
            'id' => '4',
            'user_id' => '19',
            'social_name' => '',
            'mother_name' => 'Luiza Gomes',
            'father_name' => '',
            'observation' => '',
            'responsible_name' => '',
            'responsible_phone' => ''
        ]);

        DB::table('patients')->insert([
            'id' => '5',
            'user_id' => '20',
            'social_name' => '',
            'mother_name' => 'Marisol Caetano Oliveira',
            'father_name' => 'Marcos Andrade',
            'observation' => 'Intolerante a lactose',
            'responsible_name' => '',
            'responsible_phone' => ''
        ]);

        DB::table('patients')->insert([
            'id' => '6',
            'user_id' => '21',
            'social_name' => '',
            'mother_name' => 'Lúcia Maria T. Nunes',
            'father_name' => 'Caetano Andrade',
            'observation' => '',
            'responsible_name' => '',
            'responsible_phone' => ''
        ]);
    }
}
