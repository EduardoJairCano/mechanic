<?php

namespace mechanicus;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function roles(){
        return $this->belongsToMany('mechanicus\Role');
    }

    /**
     * Función que valida los permisos con los que cuenta cada rol
     *
     * @param object
     * @return boolean
     */
    public function authorizeRoles($roles) {
        if($this->hasAnyRole($roles)) {
            return true;
        }
        /* El método abort() sirve para ejecutar errores HTTP, los cuales se enfocan en las
            autorizaciones y accesos*/
        abort(401, 'This action is unauthorized');
    }

    /**
     * Función revisa un si corresponde algun tipo de arreglo a un usuario
     *
     * @param array
     * @return boolean
     */
    public function hasAnyRole($roles) {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Función valida si un usuario cuenta con algun rol
     *
     * @param object
     * @return boolean
     */
    public function hasRole($role) {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
