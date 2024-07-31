<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class TablaPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permisos=[
            //operaciones sobre tabla role
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'eliminar-rol',

             //operaciones sobre tabla role
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'eliminar-blog',
        ];

        foreach ($permisos as $permiso) {
            Permission::create([
                'name' => $permiso
            ]);
        }
    }
}
