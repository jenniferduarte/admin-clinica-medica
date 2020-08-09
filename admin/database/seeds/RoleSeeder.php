<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'superadmin'], // Manager all clinics
            ['id' => 2, 'name' => 'admin'], // Manager one clinic
            ['id' => 3, 'name' => 'doctor'], // 
            ['id' => 4, 'name' => 'receptionist'],
            ['id' => 5, 'name' => 'laboratory'],
            ['id' => 6, 'name' => 'patient'],
        ];

        Role::insert($data);
    }
}
