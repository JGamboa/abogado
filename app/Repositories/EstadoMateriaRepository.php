<?php

namespace App\Repositories;

use App\Models\EstadoMateria;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadoMateriaRepository
 * @package App\Repositories
 * @version March 31, 2018, 4:22 pm CLST
 *
 * @method EstadoMateria findWithoutFail($id, $columns = ['*'])
 * @method EstadoMateria find($id, $columns = ['*'])
 * @method EstadoMateria first($columns = ['*'])
*/
class EstadoMateriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'materia_id',
        'estadocaso_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EstadoMateria::class;
    }
}
