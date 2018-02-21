<?php

namespace App\Repositories;

use App\Models\Profile;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProfileRepository
 * @package App\Repositories
 * @version November 26, 2017, 9:32 pm UTC
 *
 * @method Profile findWithoutFail($id, $columns = ['*'])
 * @method Profile find($id, $columns = ['*'])
 * @method Profile first($columns = ['*'])
*/
class ProfileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'rut',
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'fechaNacimiento',
        'telefono',
        'imagen'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Profile::class;
    }
}
