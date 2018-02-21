<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Region
 * @package App\Models
 * @version January 4, 2018, 3:14 pm UTC
 *
 * @property integer pais_id
 * @property string nombre
 * @property string ISO_3166_2_CL
 */
class Region extends Model
{
    use SoftDeletes;

    public $table = 'regiones';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'pais_id',
        'nombre',
        'ISO_3166_2_CL'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pais_id' => 'integer',
        'nombre' => 'string',
        'ISO_3166_2_CL' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pais_id' => 'required',
        'nombre' => 'required|max:60',
        'ISO_3166_2_CL' => 'required|max:6'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pais()
    {
        return $this->belongsTo(\App\Models\Pais::class);
    }
    
}
