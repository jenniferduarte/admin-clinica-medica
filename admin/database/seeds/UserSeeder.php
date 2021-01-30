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
            'name' => 'Super Admin',
            'email' => 'superadmin@vidasaude.com',
            'password' => Hash::make('superadmin123'),
            'role_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@vidasaude.com',
            'password' => Hash::make('admin123'),
            'role_id' => '2',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Médico',
            'email' => 'medico@vidasaude.com',
            'password' => Hash::make('medico123'),
            'role_id' => '3',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Recepcionista',
            'email' => 'recepcionista@vidasaude.com',
            'password' => Hash::make('recepcionista123'),
            'role_id' => '4',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Laboratório',
            'email' => 'laboratorio@vidasaude.com',
            'password' => Hash::make('laboratorio123'),
            'role_id' => '5',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Paciente',
            'email' => 'paciente@vidasaude.com',
            'password' => Hash::make('paciente123'),
            'role_id' => '6',
            'clinic_id' => '1'
        ]);

    }
}
