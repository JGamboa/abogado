<?php

namespace App\Models;


use Eloquent as Model;

/**
 * Class ObservacionCaso
 * @package App\Models
 * @version April 26, 2018, 3:44 pm CLST
 *
 * @property integer caso_id
 * @property integer empleado_id
 * @property string observacion
 */
class ObservacionCaso extends Model
{

    public $table = 'observaciones_casos';

    public $fillable = [
        'caso_id',
        'empleado_id',
        'observacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'caso_id' => 'integer',
        'empleado_id' => 'integer',
        'observacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'caso_id' => 'exists:casos',
        'empleado_id' => 'exists:empleados',
        'oficio' => 'required|max:255',
    ];

}
