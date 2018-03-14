<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Corte
 * @package App\Models
 * @version March 14, 2018, 9:40 am CLST
 *
 * @property string nombre
 */
class Corte extends Model
{
    use SoftDeletes;

    public $table = 'cortes';
    

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
        'nombre' => 'max:30'
    ];

    
}
