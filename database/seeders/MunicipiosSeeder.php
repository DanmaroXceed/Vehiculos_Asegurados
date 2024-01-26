<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Municipio;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("catalogos/municipios.csv"), "r");

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                Municipio::create([
                    "est_id" => $data['0'],
                    "mun_id" => $data['1'],
                    "descripcion" => $data['2'],
                ]);    

            }

            $firstline = false;

        }

        fclose($csvFile);
    }
}
