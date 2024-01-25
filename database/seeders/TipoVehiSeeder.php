<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo_vehi;

class TipoVehiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("catalogos/tipo_v.csv"), "r");

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                Tipo_vehi::create([
                    "descripcion" => $data['1'],
                    
                    "clasific_id" => $data['0'],
                ]);    

            }

            $firstline = false;

        }

        fclose($csvFile);
    }
}
