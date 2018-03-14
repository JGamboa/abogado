<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Materia
 * @package App\Models
 * @version March 12, 2018, 5:26 pm CLST
 *
 * @property string nombre
 * @property string color
 */
class Materia extends Model
{
    use SoftDeletes;

    public $table = 'materias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'color'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string',
        'color' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'max:20',
        'color' => 'max:7'
    ];

    
}
