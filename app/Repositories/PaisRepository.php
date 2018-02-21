<?php

namespace App\Repositories;

use App\Models\Pais;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PaisRepository
 * @package App\Repositories
 * @version December 26, 2017, 7:54 am UTC
 *
 * @method Pais findWithoutFail($id, $columns = ['*'])
 * @method Pais find($id, $columns = ['*'])
 * @method Pais first($columns = ['*'])
*/
class PaisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigo_pais',
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pais::class;
    }
}
