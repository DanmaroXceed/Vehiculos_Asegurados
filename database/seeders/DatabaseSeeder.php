<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cargo;
use App\Models\Unidad;
use App\Models\Distrito;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Cargo::create([
            'descripcion' => 'Administrador'
        ]);

        Unidad::create([
            'descripcion' => 'Administrador'
        ]);

        Distrito::create([
            'descripcion' => 'Administrador'
        ]);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'usuario' => 'admin',
            'tipo' => 1,
            'password' => 'Admin@',
            'cargo_id' => 1,
            'unidad_id' => 1,
            'distrito_id' => 1,
        ]);

        $this->call(CargoSeeder::class);
        $this->call(UnidadSeeder::class);
        $this->call(DistritoSeeder::class);
        $this->call(ClasificVehiSeeder::class);
        $this->call(TipoVehiSeeder::class);
        $this->call(MarcaSeeder::class);
        $this->call(SubmarcaSeeder::class);
    }
}
