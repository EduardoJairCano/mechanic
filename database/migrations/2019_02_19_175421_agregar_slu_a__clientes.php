<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarSluAClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*  Agregamos la columno Slug para la tabla cliente, la cual servira para ocultar
        informacion relevante en la URL sobre le cliente */
        Schema::table('clientes', function (Blueprint $table) {
            $table->string('slug')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*  Esta función sirve para decir que es lo que va a realizar, en caso de ser necesario,
         un reverse a la migration:rollback */
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
