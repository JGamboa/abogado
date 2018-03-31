<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EstadoMateria
 * @package App\Models
 * @version March 31, 2018, 4:22 pm CLST
 *
 * @property integer materia_id
 * @property integer estadocaso_id
 */
class EstadoMateria extends Model
{
    use SoftDeletes;

    public $table = 'estados_materias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'materia_id',
        'estadocaso_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'materia_id' => 'integer',
        'estadocaso_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'materia_id' => 'required',
        'estadocaso_id' => 'required'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function materia()
    {
        return $this->belongsTo(\App\Models\Materia::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function estadoCaso()
    {
        return $this->belongsTo(\App\Models\EstadoCaso::class, 'estadocaso_id');
    }

}
