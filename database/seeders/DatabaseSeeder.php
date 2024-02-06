<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cargo;
use App\Models\Unidad;
use App\Models\Distrito;
use App\Models\DatosRobo;
use App\Models\FuenteInfo;
use App\Models\FormaRobo;

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

        FuenteInfo::create([
            'descripcion' => 'N/A'
        ]);

        FormaRobo::create([
            'descripcion' => 'N/A'
        ]);

        DatosRobo::create([
            'fuente_id' => 1,
            'lugar' => 'N/A',
            'fecha' => "1000-01-01",
            'forma_robo_id' => 1
        ]);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'usuario' => 'admin',
            'tipo' => 1,
            'password' => 'admin123',
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
        $this->call(MotivosSeeder::class);
        $this->call(AutoridadesSeeder::class);
        $this->call(FuentesInfoSeeder::class);
        $this->call(FormasRoboSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(MunicipiosSeeder::class);
        $this->call(LocalidadesSeeder::class);
        $this->call(DelitosSeeder::class);
    }
}
