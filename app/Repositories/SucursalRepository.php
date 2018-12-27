<?php

namespace App\Repositories;

use App\Models\Sucursal;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SucursalRepository
 * @package App\Repositories
 * @version February 19, 2018, 6:01 pm CLST
 *
 * @method Sucursal findWithoutFail($id, $columns = ['*'])
 * @method Sucursal find($id, $columns = ['*'])
 * @method Sucursal first($columns = ['*'])
*/
class SucursalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'empresas_id',
        'nombre',
        'direccion',
        'region_id',
        'comuna_id',
        'provincia_id',
        'tipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Sucursal::class;
    }
}
