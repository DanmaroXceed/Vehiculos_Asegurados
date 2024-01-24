<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unidad;


class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Unidad::truncate();

        $csvFile = fopen(base_path("catalogos/unidades.csv"), "r");

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                Unidad::create([

                    "descripcion" => $data['0']

                    // "code" => $data['1']

                ]);    

            }

            $firstline = false;

        }

        fclose($csvFile);
    }
}
