<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**s
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('rols')->insert([
            [
            'name' => 'admin',
            'descripcion' => 'admin',
            ],
            [
                'name' => 'secretaria',
                'descripcion' => 'secretaria',
            ],
        ]);
        
        
        DB::table('users')->insert([
            [
            'name' => 'admin',
            'email' => 'admin@example.com',
            'idRol'=>'1',
            'email_verified_at' =>'2023-03-07 12:05:25',
            'password' => Hash::make('123456'),
            'activo'=>true,
            'remember_token' => 'uodt9o2WKFbr0U3rR5FSThJ16HLXZQhnm6IfJDcsU1MHhmpQlyeXkzgFTsdi',
            ],
            [
                'name' => 'secretaria',
                'email' => 'secretaria@example.com',
                'idRol'=>'2',
                'email_verified_at' =>'2023-03-07 12:05:25',
                'password' => Hash::make('123456'),
                'activo'=>true,
                'remember_token' => 'uodt9o2WKFbr0U3rR5FSThJ16HLXZQhnm6IfJDcsU1MHhmpQlyeXkzgFTsdi',
                ],
        ]);
        DB::table('permisos')->insert([
            [
            'name' => 'ACCESO- usuarios',
            ],
            [
            'name' => 'ACCESO- roles',
            ],
            [
            'name' => 'REGISTROS- Alumnos',
            ],
            [
            'name' => 'REGISTROS- Cursos',
            ],
        ]);
        DB::table('rol_permiso')->insert([
            [
                'idRol' => 1,
                'idPermiso' => 1,
            ],
            [
                'idRol' => 1,
                'idPermiso' => 2,
            ],
            [
                'idRol' => 1,
                'idPermiso' => 3,
            ],
            [
                'idRol' => 1,
                'idPermiso' => 4,
            ],
            [
                'idRol' => 2,
                'idPermiso' => 3,
            ],
            [
                'idRol' => 2,
                'idPermiso' => 4,
            ],
        ]);
        
        DB::table('cursos')->insert([
            [
            'nombre' => 'Logica',
            'docente' => 'Carlos Julca',
            'area'=>'Ciencias',
            'nivel' =>'Basico',
            ],
        ]);
        DB::table('planes')->insert([
            [
                'descripcion'=>'Plan1',
                'costo'=>1200,
            ],
            [
                'descripcion'=>'Plan2',
                'costo'=>1500
            ],
        ]);

        DB::table('grupos')->insert([
            [
                'descripcion'=>'Grupo1',
            ],
            [
                'descripcion'=>'Grupo2',
            ],
        ]);

        DB::table('estado_asistencias')->insert([
            [
                'descripcion'=>'Presente',
            ],
            [
                'descripcion'=>'Ausente',
            ],
            [
                'descripcion'=>'Sin Contrato'
            ],
            [
                'descripcion'=>'Sin Pago'
            ]
        ]);
    }
}
