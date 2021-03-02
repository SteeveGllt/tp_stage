<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Entreprise;

class StagesTableSeeder extends Seeder
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
            DB::table('stages')->insert([
            'id' => $i,
            'titre' => "titre $i",
            'description' => "description $i",
            'datedebut' => Carbon::now(),
            'datefin' => Carbon::now(),
            'entreprise_id' => Entreprise::all()->first()->id
            ]);
        }
        
    }
}
