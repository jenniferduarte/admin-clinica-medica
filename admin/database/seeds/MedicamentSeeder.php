<?php

use Illuminate\Database\Seeder;

class MedicamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medicaments')->insert([
            'factory_name' => 'ADVIL',
            'generic_name' => 'Ibuprofeno',
            'manufacturer' => '	Pfizer Consumo',
        ]);

        DB::table('medicaments')->insert([
            'factory_name' => 'AMOXIL',
            'generic_name' => 'Amoxicilina',
            'manufacturer' => 'GlaxoSmithKline',
        ]);

        DB::table('medicaments')->insert([
            'factory_name' => 'COZAAR',
            'generic_name' => 'Losartana',
            'manufacturer' => 'Merck Sharp & Dohme',
        ]);

        DB::table('medicaments')->insert([
            'factory_name' => 'DURLAZA',
            'generic_name' => 'Aspirina',
            'manufacturer' => '',
        ]);

        DB::table('medicaments')->insert([
            'factory_name' => 'ACZONE',
            'generic_name' => 'Dapsona',
            'manufacturer' => '',
        ]);
    }
}
