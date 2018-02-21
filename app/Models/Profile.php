<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profile
 * @package App\Models
 * @version November 26, 2017, 9:32 pm UTC
 *
 * @property integer users_id
 * @property string rut
 * @property string nombres
 * @property string apellidoPaterno
 * @property string apellidoMaterno
 * @property date fechaNacimiento
 * @property string telefono
 * @property binary imagen
 * @property string contacto_accidente
 */
class Profile extends Model
{
    use SoftDeletes;

    public $table = 'profiles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'users_id',
        'rut',
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'fechaNacimiento',
        'telefono',
        'imagen',
        'contacto_accidente'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'empleados_id' => 'integer',
        'rut' => 'string',
        'nombres' => 'string',
        'apellidoPaterno' => 'string',
        'apellidoMaterno' => 'string',
        'fechaNacimiento' => 'string',
        'telefono' => 'string',
        'contacto_accidente' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'empleados_id' => 'required|exists:empleados,id|unique:profiles,empleados_id',
        'rut' => 'required|max:10',
        'nombres' => 'required|max:100',
        'apellidoPaterno' => 'required|max:70',
        'apellidoMaterno' => 'required|max:70',
        'fechaNacimiento' => 'required|date',
        'telefono' => 'max:15|nullable',
        'imagen' => 'image|nullable',
        'contacto_accidente' => 'required|max:70',
    ];

    
}
