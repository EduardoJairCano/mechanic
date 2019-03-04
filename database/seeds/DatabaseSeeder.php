<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         Para que se realicen los nuevos cambios realizados por los seeders es necesario utilizar esta función
            para llamar a las demas
        */
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
