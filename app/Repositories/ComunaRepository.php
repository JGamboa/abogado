<?php

namespace App\Repositories;

use App\Models\Comuna;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ComunaRepository
 * @package App\Repositories
 * @version December 26, 2017, 7:56 am UTC
 *
 * @method Comuna findWithoutFail($id, $columns = ['*'])
 * @method Comuna find($id, $columns = ['*'])
 * @method Comuna first($columns = ['*'])
*/
class ComunaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pais_id',
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comuna::class;
    }
}
