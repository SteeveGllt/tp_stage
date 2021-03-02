<?php

use Illuminate\Database\Seeder;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++)
        {
            DB::table('entreprises')->insert([
            'id' => $i,
            'nom' => "nom $i",
            'ville' => "ville $i",
            'tel' => "06XXXXXXXX"
            ]);
        }
    }
}
