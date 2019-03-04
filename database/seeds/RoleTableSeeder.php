<?php

use Illuminate\Database\Seeder;
use mechanicus\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Creacion de registros "prueba" para modelos */
        $role = new Role();
        $role->name = "admin";
        $role->description = "Administrador";
        $role->save();

        $role = new Role();
        $role->name = "user";
        $role->description = "Usuario";
        $role->save();
    }
}
