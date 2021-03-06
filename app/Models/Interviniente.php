<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AppendEmpresa;
use App\Traits\OnSaveEmpresa;

/**
 * Class Interviniente
 * @package App\Models
 * @version March 14, 2018, 10:22 am CLST
 *
 * @property integer empresa_id
 * @property string rut
 * @property string nombres
 * @property string apellido_paterno
 * @property string apellido_materno
 * @property string direccion
 * @property integer region_id
 * @property integer provincia_id
 * @property integer comuna_id
 * @property string oficio
 * @property string telefonos
 * @property string correo_electronico
 * @property integer isapre_id
 * @property string observacion
 */
class Interviniente extends Model
{
    use SoftDeletes;
    use AppendEmpresa;
    use OnSaveEmpresa;

    public $table = 'intervinientes';

    protected $appends = ["text"];

    protected $dates = ['deleted_at'];


    public $fillable = [
        'empresa_id',
        'rut',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'direccion',
        'region_id',
        'provincia_id',
        'comuna_id',
        'oficio',
        'telefonos',
        'correo_electronico',
        'isapre_id',
        'observacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'empresa_id' => 'integer',
        'rut' => 'string',
        'nombres' => 'string',
        'apellido_paterno' => 'string',
        'apellido_materno' => 'string',
        'direccion' => 'string',
        'region_id' => 'integer',
        'provincia_id' => 'integer',
        'comuna_id' => 'integer',
        'oficio' => 'string',
        'telefonos' => 'string',
        'correo_electronico' => 'string',
        'isapre_id' => 'integer',
        'observacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'rut' => 'max:12|cl_rut|required',
        'nombres' => 'max:100|required',
        'apellido_paterno' => 'max:70',
        'apellido_materno' => 'max:70',
        'direccion' => 'max:70|required',
        'region_id' => 'required',
        'provincia_id' => 'required',
        'comuna_id' => 'required',
        'oficio' => 'max:50',
        'telefonos' => 'max:100',
        'correo_electronico' => 'max:80',
        'isapre_id' => 'required',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function isapre()
    {
        return $this->belongsTo(\App\Models\Isapre::class);
    }


    public function getTextAttribute(){
        return $this->rut . " - " . $this->nombres . " " . $this->getApellidos();
    }

    public function getApellidos(){
        return $this->apellido_paterno . " " . $this->apellido_materno;
    }

    public function getNombreCompletoAttribute(){
        return $this->nombres . " " . $this->getApellidos();
    }

    public static function getCreadosPorPeriodo($year, $month){
        $interviniente = new Interviniente();
        return $interviniente->whereYear('created_at', $year)
                           ->whereMonth('created_at', $month)->get();
    }

    public static function buscar($request){
        $intervinientes = new Interviniente();

        if($request->filled('rut')){
            $intervinientes = $intervinientes->where('rut', $request->rut);
        }

        if($request->filled('nombres')){
            $intervinientes = $intervinientes->where('nombres', 'like',  '%' . $request->nombres . '%');
        }

        if($request->filled('apellido_paterno')){
            $intervinientes = $intervinientes->where('apellido_paterno', 'like',  '%' . $request->apellido_paterno . '%');
        }

        if($request->filled('apellido_materno')){
            $intervinientes = $intervinientes->where('apellido_materno', 'like',  '%' . $request->apellido_materno . '%');
        }

        return $intervinientes;
    }

}
