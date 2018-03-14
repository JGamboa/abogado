<?php

namespace App\Repositories;

use App\Models\Corte;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CorteRepository
 * @package App\Repositories
 * @version March 14, 2018, 9:40 am CLST
 *
 * @method Corte findWithoutFail($id, $columns = ['*'])
 * @method Corte find($id, $columns = ['*'])
 * @method Corte first($columns = ['*'])
*/
class CorteRepository extends BaseRepository
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
        return Corte::class;
    }
}
