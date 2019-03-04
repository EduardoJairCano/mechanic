<?php

use Illuminate\Database\Seeder;
use mechanicus\User;
use mechanicus\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Asignación de usuarios con roles User y Admin por medio de Querys */
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Usuario';
        $user->email = 'usuario@mail.com';
        // bcrypt() - función de encriptacion de laravel por defecto
        $user->password = bcrypt('usuario');
        $user->save();
        /* Para poder relacionar a dos modelos:
            - se tiene que asignar el tipo de rol en una variable
            - en un objeto se actualizan los datos del modelo a relacionar
            - se almacena el modelo en la base de datos
            - se llama a la función relacion del objeto, para despues utilizar la función attach(<$objeto1_deñ_modelo>)
                para hacer la relación.
        */
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@mail.com';
        $user->password = bcrypt('administrador');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
