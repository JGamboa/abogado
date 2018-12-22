<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Provincia
 * @package App\Models
 * @version December 26, 2017, 8:01 am UTC
 *
 * @property integer region_id
 * @property string nombre
 */
class Provincia extends Model
{
    use SoftDeletes;

    public $table = 'provincias';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'region_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'region_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'region_id' => 'required|exists:regiones,id',
        'nombre' => 'required|max:60'
    ];

    
}
