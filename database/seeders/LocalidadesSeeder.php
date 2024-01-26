<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Localidad;

class LocalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("catalogos/localidades.csv"), "r");

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                Localidad::create([
                    "est_id" => $data['0'],
                    "mun_id" => $data['1'],
                    "loc_id" => $data['2'],
                    "descripcion" => $data['3'],
                ]);    

            }

            $firstline = false;

        }

        fclose($csvFile);
    }
}
