<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Generar 10 registros de prueba
        for ($i = 0; $i < 10; $i++) {
            DB::table('alumnos')->insert([
                'nombre'=>'Alumno '.($i + 1),
                'telefono'=>'555'.rand(1000000, 9999999),
                'edad'=>rand(18, 80),
                'password' => bcrypt(''), // Contraseña encriptada
                'email' => strtolower(str_replace(' ','',$nombre)).'@ejemplo.com',
                'genero'=>rand(0, 1)?'M':'F',
            ]);
        }
    }
}
