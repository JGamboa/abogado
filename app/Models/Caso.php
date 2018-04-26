<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\AppendEmpresa;
use App\Traits\OnSaveEmpresa;

/**
 * Class Caso
 * @package App\Models
 * @version March 31, 2018, 6:05 pm CLST
 *
 * @property integer empresa_id
 * @property json cliente
 * @property json contraparte
 * @property date fecha_recurso
 * @property date fecha_captacion
 * @property integer captador
 * @property string rol
 * @property integer materia_id
 * @property integer estadocaso_id
 * @property integer corte_id
 * @property string tribunal
 * @property integer responsable_proceso
 * @property boolean pyp
 */
class Caso extends Model
{
    use SoftDeletes;
    use AppendEmpresa;
    use OnSaveEmpresa;

    public $table = 'casos';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'empresa_id',
        'cliente',
        'contraparte',
        'fecha_recurso',
        'fecha_captacion',
        'captador',
        'rol',
        'materia_id',
        'estadocaso_id',
        'corte_id',
        'tribunal',
        'responsable_proceso',
        'pyp'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'empresa_id' => 'integer',
        'cliente' => 'object',
        'contraparte' => 'object',
        'fecha_recurso' => 'date',
        'fecha_captacion' => 'date',
        'captador' => 'integer',
        'rol' => 'string',
        'materia_id' => 'integer',
        'estadocaso_id' => 'integer',
        'corte_id' => 'integer',
        'tribunal' => 'string',
        'responsable_proceso' => 'integer',
        'pyp' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'cliente' => 'json|required',
        //'contraparte' => 'json|required',
        'fecha_recurso' => 'date',
        'fecha_captacion' => 'date|required',
        'captador' => 'required',
        'rol' => 'required|max:50',
        'materia_id' => 'required',
        'corte_id' => 'required',
        'tribunal' => 'required|max:30',
        'pyp' => 'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function materia()
    {
        return $this->belongsTo(\App\Models\Materia::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function estadoCaso()
    {
        return $this->belongsTo(\App\Models\EstadoCaso::class, 'estadocaso_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function corte()
    {
        return $this->belongsTo(\App\Models\Corte::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function datosCaptador(){

        return $this->hasOne(\App\Models\Empleado::class, 'id', 'captador');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function datosResponsable(){

        return $this->hasOne(\App\Models\Empleado::class, 'id', 'responsable_proceso');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * devuelve la lista de empleados de la empresa en sesion
     */
    public function uploads(){

        return $this->belongsToMany(\App\Models\Upload::class, 'casos_uploads', 'caso_id', 'upload_id');

    }

    public function getNombreCompleto($persona){
        return $persona->nombres . " " . $persona->apellido_paterno . " " . $persona->apellido_materno;
    }

    public function getDireccion($persona){
        return $persona->direccion . ", " . $persona->comuna->nombre . ", " . $persona->provincia->nombre . ", " . $persona->region->nombre;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function observaciones()
    {
        return $this->hasMany(ObservacionCaso::class);
    }


}
