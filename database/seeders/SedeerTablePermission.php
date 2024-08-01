<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//spartie
use Spatie\Permission\Models\Permission;

class SedeerTablePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'eliminar-rol',

            //tabla blog
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'eliminar-blog',

        ];
        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
