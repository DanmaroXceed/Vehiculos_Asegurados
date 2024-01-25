<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FuenteInfo;

class FuentesInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("catalogos/fuentes_info.csv"), "r");

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                FuenteInfo::create([
                    "descripcion" => $data['0']
                ]);    

            }

            $firstline = false;

        }

        fclose($csvFile);
    }
}
