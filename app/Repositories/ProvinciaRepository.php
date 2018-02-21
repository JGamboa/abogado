<?php

namespace App\Repositories;

use App\Models\Provincia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProvinciaRepository
 * @package App\Repositories
 * @version December 26, 2017, 8:01 am UTC
 *
 * @method Provincia findWithoutFail($id, $columns = ['*'])
 * @method Provincia find($id, $columns = ['*'])
 * @method Provincia first($columns = ['*'])
*/
class ProvinciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'regiones_id',
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Provincia::class;
    }
}
