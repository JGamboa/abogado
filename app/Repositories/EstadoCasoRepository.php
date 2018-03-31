<?php

namespace App\Repositories;

use App\Models\EstadoCaso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EstadoCasoRepository
 * @package App\Repositories
 * @version March 31, 2018, 1:10 pm CLST
 *
 * @method EstadoCaso findWithoutFail($id, $columns = ['*'])
 * @method EstadoCaso find($id, $columns = ['*'])
 * @method EstadoCaso first($columns = ['*'])
*/
class EstadoCasoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EstadoCaso::class;
    }
}
