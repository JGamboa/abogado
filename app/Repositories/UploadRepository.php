<?php

namespace App\Repositories;

use App\Models\Upload;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UploadRepository
 * @package App\Repositories
 * @version March 28, 2018, 1:21 pm CLST
 *
 * @method Upload findWithoutFail($id, $columns = ['*'])
 * @method Upload find($id, $columns = ['*'])
 * @method Upload first($columns = ['*'])
*/
class UploadRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'path',
        'extension',
        'caption',
        'empleado_id',
        'hash',
        'isPublic'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Upload::class;
    }
}
