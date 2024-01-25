<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Submarca;

class SubmarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("catalogos/submarcas.csv"), "r");

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, "|")) !== FALSE) {

            if (!$firstline) {

                Submarca::create([
                    "descripcion" => $data['0'],
                    
                    "marca_id" => $data['1']
                ]);    

            }

            $firstline = false;

        }

        fclose($csvFile);
    }
}
