<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Sucursal",
 *      required={"empresa_id", "nombre", "direccion", "comunas_id", "provincias_id", "tipo"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="empresa_id",
 *          description="empresa_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombre",
 *          description="nombre",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="direccion",
 *          description="direccion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="comunas_id",
 *          description="comunas_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="provincias_id",
 *          description="provincias_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tipo",
 *          description="tipo",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Sucursal extends Model
{
    use SoftDeletes;

    public $table = 'sucursales';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'empresa_id',
        'nombre',
        'direccion',
        'comunas_id',
        'provincias_id',
        'tipo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'empresa_id' => 'integer',
        'nombre' => 'string',
        'direccion' => 'string',
        'comunas_id' => 'integer',
        'provincias_id' => 'integer',
        'tipo' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'empresa_id' => 'required',
        'nombre' => 'required|max:40',
        'direccion' => 'required|max:70',
        'comunas_id' => 'required',
        'provincias_id' => 'required',
        'tipo' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function comuna()
    {
        return $this->belongsTo(\App\Models\Comuna::class, 'comunas_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function provincia()
    {
        return $this->belongsTo(\App\Models\Provincia::class, 'provincias_id');
    }

    function getTipoTexto(){
        if($this->tipo == 1){
            return "Domicilio";
        }else{
            return "Sucursal";
        }
    }
}
