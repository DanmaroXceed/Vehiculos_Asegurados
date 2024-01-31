<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Delito;

class DelitosSeeder extends Seeder
{
    public function run(): void
    {
        $csvFile = fopen(base_path("catalogos/delitos.csv"), "r");

        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            Delito::create([
                "descripcion" => $data['0'],
            ]);    
        }

        fclose($csvFile);
    }
}
