<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Backpack\CRUD\CrudTrait; // <------------------------------- this one
use Spatie\Permission\Traits\HasRoles;// <---------------------- and this one
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this

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
     * The companys that belong to the user.
     */
    public function empresas()
    {

        return $this->belongsToMany('App\Models\Empresa', 'empleados');

    }

    public function isSuperAdmin(){
        $roles_users = \DB::table('role_users')->select('role_id')->where('role_id', 1)->where('user_id', Auth::user()->id)->get();
        if(count($roles_users)>0){
            return true;
        }else{
            return false;
        }
    }

    public function asignarEmpresa($empresa){
        session(['empresa_id' => $empresa->id]);
        session(['empresa_razon_social' => $empresa->razon_social]);
        session(['empresa_rut' => $empresa->rut]);
        app()['cache']->forget('spatie.permission.cache');
    }
}
