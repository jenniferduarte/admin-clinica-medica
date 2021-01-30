<?php

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            'street' => 'Rua Ilha do Governador',
            'number' => '13',
            'district' => 'Enseada',
            'complement' => 'Ap. 410',
            'state' => 'ES',
            'country' => 'Brasil',
            'cep' => '26687888',
            'city' => 'Vitória',
            'responsible_type' => 'App\User',
            'responsible_id' => '1',
        ]);

        DB::table('addresses')->insert([
            'street' => 'Rua Ilha do Principe',
            'number' => '181',
            'district' => 'Valparaiso',
            'complement' => 'Casa',
            'state' => 'MG',
            'country' => 'Brasil',
            'cep' => '29181771',
            'city' => 'Betim',
            'responsible_type' => 'App\User',
            'responsible_id' => '2',
        ]);

        DB::table('addresses')->insert([
            'street' => 'Rua das Flores',
            'number' => '20',
            'district' => 'Colina da Serra',
            'complement' => 'Casa',
            'state' => 'SP',
            'country' => 'Brasil',
            'cep' => '29165444',
            'city' => 'São Paulo',
            'responsible_type' => 'App\User',
            'responsible_id' => '3',
        ]);

        DB::table('addresses')->insert([
            'street' => 'Rua Guriri',
            'number' => '14',
            'district' => 'Barcelona',
            'complement' => 'Ap 203 Bloco E',
            'state' => 'ES',
            'country' => 'Brasil',
            'cep' => '29165810',
            'city' => 'Serra',
            'responsible_type' => 'App\User',
            'responsible_id' => '4',
        ]);

        DB::table('addresses')->insert([
            'street' => 'Rua Antonio Carlos da Silva',
            'number' => '90',
            'district' => 'Jardim Camburi',
            'complement' => 'Casa',
            'state' => 'ES',
            'country' => 'Brasil',
            'cep' => '455888779',
            'city' => 'Vila Velha',
            'responsible_type' => 'App\User',
            'responsible_id' => '5',
        ]);

        DB::table('addresses')->insert([
            'street' => 'Rua Marcela Antonia',
            'number' => '290',
            'district' => 'Bento Ferreira',
            'complement' => 'Casa',
            'state' => 'ES',
            'country' => 'Brasil',
            'cep' => '29165440',
            'city' => 'Cariacica',
            'responsible_type' => 'App\User',
            'responsible_id' => '6',
        ]);
    }
}
