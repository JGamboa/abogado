<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\OnSaveEmpresa;

/**
 * Class Upload
 * @package App\Models
 * @version March 28, 2018, 1:21 pm CLST
 *
 * @property integer empresa_id
 * @property string name
 * @property string path
 * @property string extension
 * @property string caption
 * @property integer empleado_id
 * @property string hash
 * @property boolean isPublic
 */
class Upload extends Model
{
    use SoftDeletes;
    use OnSaveEmpresa;

    public $table = 'uploads';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'path',
        'extension',
        'caption',
        'empleado_id',
        'hash',
        'isPublic'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'path' => 'string',
        'extension' => 'string',
        'caption' => 'string',
        'empleado_id' => 'integer',
        'hash' => 'string',
        'isPublic' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'max:250|required',
        'path' => 'max:20',
        'extension' => 'max:250',
        'caption' => 'max:250',
        'hash' => 'max:250',
        'isPublic' => 'boolean'
    ];

    /**
     * Get the user that owns upload.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\Empleado');
    }
    
}
