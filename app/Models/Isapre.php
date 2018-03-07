<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Isapre
 * @package App\Models
 * @version March 7, 2018, 2:32 am CLST
 *
 * @property string nombre
 */
class Isapre extends Model
{
    use SoftDeletes;

    public $table = 'isapres';
    

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
