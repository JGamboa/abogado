<?php

namespace App\Repositories;

use App\Models\Interviniente;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class IntervinienteRepository
 * @package App\Repositories
 * @version March 14, 2018, 10:22 am CLST
 *
 * @method Interviniente findWithoutFail($id, $columns = ['*'])
 * @method Interviniente find($id, $columns = ['*'])
 * @method Interviniente first($columns = ['*'])
*/
class IntervinienteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'empresa_id',
        'rut',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'direccion',
        'region_id',
        'comuna_id',
        'provincia_id',
        'oficio',
        'telefonos',
        'correo_electronico',
        'isapre',
        'observacion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Interviniente::class;
    }
}
