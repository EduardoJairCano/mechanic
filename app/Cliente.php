<?php

namespace mechanicus;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /*  Creación de una funcipon porpia del modelo para la implementación del atributo llave ruta
        para el modelo, con esto se evita el tener que instanciar el modelo en el controlador */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
