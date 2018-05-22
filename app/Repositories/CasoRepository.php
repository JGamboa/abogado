<?php

namespace App\Repositories;

use App\Models\Caso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CasoRepository
 * @package App\Repositories
 * @version March 31, 2018, 6:05 pm CLST
 *
 * @method Caso findWithoutFail($id, $columns = ['*'])
 * @method Caso find($id, $columns = ['*'])
 * @method Caso first($columns = ['*'])
*/
class CasoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'contraparte->nombre'=>'like',
        'contraparte->apellido_paterno'=>'like',
        'contraparte->apellido_materno'=>'like',
        'cliente',
        'contraparte',
        'fecha_recurso',
        'fecha_captacion',
        'captador',
        'rol',
        'materia_id',
        'estadocaso_id',
        'corte_id',
        'tribunal',
        'responsable_proceso',
        'pyp'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Caso::class;
    }
}
