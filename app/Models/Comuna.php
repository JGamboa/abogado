<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comuna
 * @package App\Models
 * @version December 26, 2017, 7:56 am UTC
 *
 * @property integer provincia_id
 * @property string nombre
 * @property-read Provincia provincia
 */
class Comuna extends Model
{
    use SoftDeletes;

    public $table = 'comunas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'provincia_id',
        'nombre'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'provincia_id' => 'integer',
        'nombre' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'provincia_id' => 'required|exists:provincias,id',
        'nombre' => 'required|max:60|unique:comunas,nombre'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function provincia()
    {
        return $this->belongsTo(\App\Models\Provincia::class);
    }

    
}
