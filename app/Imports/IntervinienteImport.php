<?php

namespace App\Imports;

use App\Models\Comuna;
use App\Models\Interviniente;
use Freshwork\ChileanBundle\Rut;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class IntervinienteImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        /* @var $comuna Comuna */
        $comuna = Comuna::find($row['comuna']);
        $rut = Rut::parse($row['rut'])->format(Rut::FORMAT_WITH_DASH); //return 12345678-5.

        Validator::make($row,
            [
            '*.rut' => Rule::unique('intervinientes')->where(function ($query) use ($rut) {
                return $query->whereRut($rut)->where('empresa_id', session('empresa_id'));
            })

            ])->validate();

        return new Interviniente([
            'rut' => $rut,
            'nombres' => $row['nombres'],
            'apellido_paterno' => $row['a_paterno'],
            'apellido_materno' => $row['a_materno'],
            'direccion' => $row['direccion'],
            'region_id' => $comuna->provincia->region_id,
            'provincia_id' => $comuna->provincia_id,
            'comuna_id' => $row['comuna'],
            'oficio' => $row['profesion'],
            'telefonos' => $row['telefonos'],
            'correo_electronico' => strtolower($row['correo_electronico']),
            'isapre_id' => $row['isapre'],
            'observacion' => trim($row['observacion']),
        ]);
    }

    public function rules(): array
    {
        return [
            'rut' => 'max:12|cl_rut|required',
            'nombres' => 'max:100|required',
            'a_paterno' => 'max:70',
            'a_materno' => 'max:70',
            'direccion' => 'max:70|required',
            'comuna' => 'required',
            'profesion' => 'max:50',
            'telefonos' => 'max:100',
            'correo_electronico' => 'max:80',
            'isapre' => 'required',
        ];
    }
}
