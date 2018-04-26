<?php

namespace App\Repositories;

use App\Models\ObservacionCaso;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ObservacionCasoRepository
 * @package App\Repositories
 * @version April 26, 2018, 5:28 pm CLST
 *
 * @method ObservacionCaso findWithoutFail($id, $columns = ['*'])
 * @method ObservacionCaso find($id, $columns = ['*'])
 * @method ObservacionCaso first($columns = ['*'])
 */
class ObservacionCasoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'caso_id',
        'empleado_id',
        'observacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ObservacionCaso::class;
    }
}
