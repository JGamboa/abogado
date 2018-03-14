<?php

namespace App\Repositories;

use App\Models\Materia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MateriaRepository
 * @package App\Repositories
 * @version March 12, 2018, 5:26 pm CLST
 *
 * @method Materia findWithoutFail($id, $columns = ['*'])
 * @method Materia find($id, $columns = ['*'])
 * @method Materia first($columns = ['*'])
*/
class MateriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'color'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Materia::class;
    }
}
