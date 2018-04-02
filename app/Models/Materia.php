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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     * devuelve la lista de empleados de la empresa en sesion
     */
    public function estadosCasos(){

        return $this->belongsToMany(\App\Models\EstadoCaso::class, 'estados_materias', 'materia_id', 'estadocaso_id');

    }


    public static function jsonMateriasEstados(){
        $materias = Materia::all();
        $texto = "{";
        foreach($materias as $materia){
            $texto .= "\"" . $materia->id . "\"" . ":[";

            foreach ($materia->estadosCasos as $estado){
                $texto .= $estado->id . ",";
            }

            $texto .=  "],";
        }

        $texto = str_replace(",]", "]", $texto);
        $texto = rtrim($texto,",");
        $texto .= "}";

        return $texto;
    }

    
}
