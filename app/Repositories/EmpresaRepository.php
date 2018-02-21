<?php

namespace App\Repositories;

use App\Models\Empresa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmpresaRepository
 * @package App\Repositories
 * @version January 20, 2018, 2:15 am UTC
 *
 * @method Empresa findWithoutFail($id, $columns = ['*'])
 * @method Empresa find($id, $columns = ['*'])
 * @method Empresa first($columns = ['*'])
*/
class EmpresaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'rut',
        'razon_social',
        'nombre_fantasia',
        'direccion',
        'comunas_id',
        'provincias_id',
        'logotipo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Empresa::class;
    }
}
