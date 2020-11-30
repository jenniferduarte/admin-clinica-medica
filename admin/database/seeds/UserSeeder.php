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
            'email' => 'sadmin@sadmin.com',
            'password' => Hash::make('sadmin123'),
            'role_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123'),
            'role_id' => '2'
        ]);

        DB::table('users')->insert([
            'name' => 'Médico',
            'email' => 'medico@medico.com',
            'password' => Hash::make('medico123'),
            'role_id' => '3',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Receptionista',
            'email' => 'receptionista@receptionista.com',
            'password' => Hash::make('receptionista123'),
            'role_id' => '4',
            'clinic_id' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Laboratorio',
            'email' => 'laboratorio@laboratorio.com',
            'password' => Hash::make('laboratorio123'),
            'role_id' => '5'
        ]);

        DB::table('users')->insert([
            'name' => 'Paciente',
            'email' => 'paciente@paciente.com',
            'password' => Hash::make('paciente123'),
            'role_id' => '6',
        ]);

    }
}
