<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('alumno')->insert([
            [
                'nombre' => 'Pepe',
                'telefono' => '666666666',
                'edad' => 20,
                'password' => '123',
                'email' => 'pepe@gmail.com',
                'sexo' => 'M',
            ],
            [
                'nombre' => 'Paco',
                'telefono' => '666777888',
                'edad' => 22,
                'password' => '1234',
                'email' => 'paco@gmail.com',
                'sexo' => 'M',
            ],
        ]);

    }
}
