<?php

namespace Database\Seeders;

use App\Models\Dependencia;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dependencia = Dependencia::create([
            'nombre_dependencia' => 'Dependencia numero 1',
            'direccion_dependencia' => 'bueno aqui va la direccion de la dependencia',
            
            'estado' => '1',
        ]);

        $admin = User::create([
            'name' => 'Rodrigo Andres',
            'email' => 'hoappy.py@gmail.com',
            'email_verified_at' => now(),
            'rut' => '19.671.144-9',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

            'estado' => '1',

            'apellido_P' => 'Garcia',
            'apellido_M' => 'Trautmann',
            'direccion'=> 'la direcion de mi casa',
            'fecha_nacimiento' => Carbon::now(),
            'grado' => 'grado diez',
            'nombre_cargo' => 'nombre del cargo administrador',
            'dependencia_id' => 1,
        ]);

        $admin->roles()->sync('1');

        $jefe = User::create([
            'name' => 'Cristina Alicia',
            'email' => 'hoappy.p@gmail.com',
            'email_verified_at' => now(),
            'rut' => '14.450.003-2',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

            'estado' => '1',

            'apellido_P' => 'Trautmann',
            'apellido_M' => 'Cisternas',
            'direccion'=> 'la direcion de mi casa 2.0',
            'fecha_nacimiento' => Carbon::now(),
            'grado' => 'grado 11',
            'nombre_cargo' => 'nombre del cargo jefe',
            'dependencia_id' => 1,
        ]);

        $jefe->roles()->sync('2');

        $user = User::create([
            'name' => 'Juan Pablo Alberto Jesus',
            'email' => 'rodrigo.garcia1601@alumnos.ubiobio.cl',
            'email_verified_at' => now(),
            'rut' => '19.000.133-3',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

            'estado' => '1',

            'apellido_P' => 'Garcia',
            'apellido_M' => 'Trautmann',
            'direccion'=> 'la direcion de mi casa 3.0',
            'fecha_nacimiento' => Carbon::now(),
            'grado' => 'grado 1',
            'nombre_cargo' => 'nombre del cargo usuario normal',
            'dependencia_id' => 1,
        ]);

        $user->roles()->sync('3');

        //User::factory(20)->create();
    }
}
