<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Empleado",
 *      required={"empresa_id", "nombres", "apellido_paterno", "apellido_materno"},
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
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nombres",
 *          description="nombres",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="apellido_paterno",
 *          description="apellido_paterno",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="apellido_materno",
 *          description="apellido_materno",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="admin",
 *          description="admin",
 *          type="boolean"
 *      )
 * )
 */
class Empleado extends Model
{
    use SoftDeletes;

    public $table = 'empleados';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'empresa_id',
        'user_id',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'admin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'empresa_id' => 'integer',
        'user_id' => 'integer',
        'nombres' => 'string',
        'apellido_paterno' => 'string',
        'apellido_materno' => 'string',
        'admin' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'empresa_id' => 'required',
        'nombres' => 'required|max:100',
        'apellido_paterno' => 'required|max:70',
        'apellido_materno' => 'required|max:70'
    ];


    public function getNombreCompleto(){
        return $this->nombres . " " . $this->apellido_paterno . " " . $this->apellido_materno;
    }
    
}
