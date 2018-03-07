<?php

namespace App\Repositories;

use App\Models\Isapre;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class IsapreRepository
 * @package App\Repositories
 * @version March 7, 2018, 2:32 am CLST
 *
 * @method Isapre findWithoutFail($id, $columns = ['*'])
 * @method Isapre find($id, $columns = ['*'])
 * @method Isapre first($columns = ['*'])
*/
class IsapreRepository extends BaseRepository
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
        return Isapre::class;
    }
}
