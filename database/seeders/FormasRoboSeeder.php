<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormaRobo;

class FormasRoboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("catalogos/formas_robo.csv"), "r");

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {

            if (!$firstline) {

                FormaRobo::create([
                    "descripcion" => $data['0']
                ]);    

            }

            $firstline = false;

        }

        fclose($csvFile);
    }
}
