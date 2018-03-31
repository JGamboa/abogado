<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EstadoCaso
 * @package App\Models
 * @version March 31, 2018, 1:10 pm CLST
 *
 * @property string nombre
 */
class EstadoCaso extends Model
{
    use SoftDeletes;

    public $table = 'estadoscasos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nombre' => 'max:50'
    ];

    
}
