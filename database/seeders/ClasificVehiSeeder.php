<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clasif_vehi;

class ClasificVehiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("catalogos/clasificacion_v.csv"), "r");

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                Clasif_vehi::create([

                    "descripcion" => $data['0']

                    // "code" => $data['1']

                ]);    

            }

            $firstline = false;

        }

        fclose($csvFile);
    }
}
