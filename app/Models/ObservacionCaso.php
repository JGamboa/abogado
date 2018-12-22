<?php

namespace App\Models;


use Eloquent as Model;
use Empleado;

/**
 * Class ObservacionCaso
 * @package App\Models
 * @version April 26, 2018, 3:44 pm CLST
 *
 * @property integer caso_id
 * @property integer user_id
 * @property string observacion
 */
class ObservacionCaso extends Model
{

    public $table = 'observaciones_casos';

    public $fillable = [
        'caso_id',
        'user_id',
        'observacion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'caso_id' => 'integer',
        'user_id' => 'integer',
        'observacion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'caso_id' => 'exists:casos',
        'user_id' => 'exists:users',
        'observacion' => 'required|max:255',
    ];

    public function empleado(){
        return Empleado::where('user_id', $this->user_id)->first();
    }

}
