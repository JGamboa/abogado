<?php

namespace App\Repositories;

use App\Models\Region;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RegionRepository
 * @package App\Repositories
 * @version January 4, 2018, 3:14 pm UTC
 *
 * @method Region findWithoutFail($id, $columns = ['*'])
 * @method Region find($id, $columns = ['*'])
 * @method Region first($columns = ['*'])
*/
class RegionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pais_id',
        'nombre',
        'ISO_3166_2_CL'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Region::class;
    }
}
