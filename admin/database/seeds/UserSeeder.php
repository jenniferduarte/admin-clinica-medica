<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Nome do Super Admin',
            'email' => 'superadmin@vidasaude.com',
            'password' => Hash::make('superadmin123'),
            'role_id' => '1'
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'name' => 'Nome do Admin',
            'email' => 'admin@vidasaude.com',
            'password' => Hash::make('admin123'),
            'role_id' => '2',
            'clinic_id' => '1'
        ]);

        // Doctors
        DB::table('users')->insert([
            'id' => '3',
            'name' => 'Nome do Médico',
            'email' => 'medico@vidasaude.com',
            'password' => Hash::make('medico123'),
            'role_id' => '3',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([
            'id' => '4',
            'name' => 'Gustavo Henrique',
            'email' => 'gustavo@vidasaude.com',
            'password' => Hash::make('gustavo123'),
            'role_id' => '3',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([

            'id' => '5',
            'name' => 'Bruno Henrique',
            'email' => 'bruno@vidasaude.com',
            'password' => Hash::make('bruno123'),
            'role_id' => '3',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([

            'id' => '6',
            'name' => 'Thiago Maia',
            'email' => 'thiago@vidasaude.com',
            'password' => Hash::make('thiago123'),
            'role_id' => '3',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([

            'id' => '7',
            'name' => 'Hugo Souza',
            'email' => 'hugo@vidasaude.com',
            'password' => Hash::make('hugo123'),
            'role_id' => '3',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([

            'id' => '8',
            'name' => 'Diego Ribas',
            'email' => 'diego@vidasaude.com',
            'password' => Hash::make('diego123'),
            'role_id' => '3',
            'clinic_id' => '1'
        ]);

        // Receptionists
        DB::table('users')->insert([

            'id' => '9',
            'name' => 'Nome do Recepcionista',
            'email' => 'recepcionista@vidasaude.com',
            'password' => Hash::make('recepcionista123'),
            'role_id' => '4',
            'clinic_id' => '1'
        ]);


        DB::table('users')->insert([

            'id' => '10',
            'name' => 'Mauricio Isla',
            'email' => 'isla@vidasaude.com',
            'password' => Hash::make('isla123'),
            'role_id' => '4',
            'clinic_id' => '1'
        ]);


        DB::table('users')->insert([

            'id' => '11',
            'name' => 'Rodrigo Caio',
            'email' => 'rodrigo@vidasaude.com',
            'password' => Hash::make('rodrigo123'),
            'role_id' => '4',
            'clinic_id' => '1'
        ]);


        // Laboratories
        DB::table('users')->insert([

            'id' => '12',
            'name' => 'Nome Responsável Lab',
            'email' => 'laboratorio@vidasaude.com',
            'password' => Hash::make('laboratorio123'),
            'role_id' => '5',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([

            'id' => '13',
            'name' => 'Giorgian De Arrascaeta',
            'email' => 'arrascaeta@vidasaude.com',
            'password' => Hash::make('arrascaeta123'),
            'role_id' => '5',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([

            'id' => '14',
            'name' => 'Diego Alves',
            'email' => 'diegoalves@vidasaude.com',
            'password' => Hash::make('diegoalves123'),
            'role_id' => '5',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([

            'id' => '15',
            'name' => 'Pedro Santos',
            'email' => 'pedro@vidasaude.com',
            'password' => Hash::make('pedro123'),
            'role_id' => '5',
            'clinic_id' => '1'
        ]);


        // Patients
        DB::table('users')->insert([
            'id' => '16',
            'name' => 'Nome do Paciente',
            'email' => 'paciente@vidasaude.com',
            'password' => Hash::make('paciente123'),
            'role_id' => '6',
            'clinic_id' => '1'
        ]);


        DB::table('users')->insert([
            'id' => '17',
            'name' => 'Everton Ribeiro',
            'email' => 'everton@vidasaude.com',
            'password' => Hash::make('everton123'),
            'role_id' => '6',
            'clinic_id' => '1'
        ]);


        DB::table('users')->insert([
            'id' => '18',
            'name' => 'João Gomes',
            'email' => 'joao@vidasaude.com',
            'password' => Hash::make('joao123'),
            'role_id' => '6',
            'clinic_id' => '1'
        ]);


        DB::table('users')->insert([
            'id' => '19',
            'name' => 'Gabriel Barbosa',
            'email' => 'gabriel@vidasaude.com',
            'password' => Hash::make('gabriel123'),
            'role_id' => '6',
            'clinic_id' => '1'
        ]);


        DB::table('users')->insert([
            'id' => '20',
            'name' => 'Filipe Luís',
            'email' => 'filipe@vidasaude.com',
            'password' => Hash::make('filipe123'),
            'role_id' => '6',
            'clinic_id' => '1'
        ]);


        DB::table('users')->insert([
            'id' => '21',
            'name' => 'Gerson Santos',
            'email' => 'gerson@vidasaude.com',
            'password' => Hash::make('gerson123'),
            'role_id' => '6',
            'clinic_id' => '1'
        ]);

    }
}
