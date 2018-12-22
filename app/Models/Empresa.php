<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Empresa
 * @package App\Models
 * @version January 20, 2018, 2:15 am UTC
 *
 * @property \App\Models\Comuna comuna
 * @property \App\Models\Provincia provincia
 * @property \App\Models\Sucursal sucursales
 * @property \Illuminate\Database\Eloquent\Collection permissionRoles
 * @property \Illuminate\Database\Eloquent\Collection permissionUsers
 * @property \Illuminate\Database\Eloquent\Collection roleUsers
 * @property string rut
 * @property string razon_social
 * @property string nombre_fantasia
 * @property string direccion
 * @property integer region_id
 * @property integer comuna_id
 * @property integer provincia_id
 * @property string logotipo
 */
class Empresa extends Model
{
    use SoftDeletes;

    public $table = 'empresas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'rut',
        'razon_social',
        'nombre_fantasia',
        'direccion',
        'region_id',
        'comuna_id',
        'provincia_id',
        'logotipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'rut' => 'string',
        'razon_social' => 'string',
        'nombre_fantasia' => 'string',
        'direccion' => 'string',
        'region_id' => 'integer',
        'comuna_id' => 'integer',
        'provincia_id' => 'integer',
        'logotipo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rut' => 'required|max:10|cl_rut',
        'razon_social' => 'required|max:150',
        'nombre_fantasia' => 'max:150',
        'direccion' => 'required|max:70',
        'region_id' => 'required',
        'comuna_id' => 'required',
        'provincia_id' => 'required',
        'logotipo' => 'max:45'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function comuna()
    {
        return $this->belongsTo(\App\Models\Comuna::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function provincia()
    {
        return $this->belongsTo(\App\Models\Provincia::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function region()
    {
        return $this->belongsTo(\App\Models\Region::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sucursales()
    {
        return $this->hasMany(\App\Models\Sucursal::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * devuelve la lista de empleados de la empresa en sesion
     */
    public function empleados(){

        return $this->hasMany(\App\Models\Empleado::class);

    }

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'empleados');
    }
}
