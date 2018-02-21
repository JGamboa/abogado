<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pais
 * @package App\Models
 * @version December 26, 2017, 7:54 am UTC
 *
 * @property string codigo_pais
 * @property string nombre
 */
class Pais extends Model
{
    use SoftDeletes;

    public $table = 'pais';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'codigo_pais',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'codigo_pais' => 'string',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'codigo_pais' => 'required|max:3',
        'nombre' => 'required|max:60'
    ];

    
}
