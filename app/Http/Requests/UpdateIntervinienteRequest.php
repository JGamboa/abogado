<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Interviniente;
use Illuminate\Validation\Rule;

class UpdateIntervinienteRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rut = $this->input('rut');
        return [
            'rut' => ['max:12', 'cl_rut', 'required', Rule::unique('intervinientes')->where(function ($query) use ($rut) {
                return $query->whereRut($rut)->where('empresa_id', session('empresa_id'));
            })->ignore($this->route('interviniente'))
            ],
            'nombres' => 'max:100|required',
            'apellido_paterno' => 'max:70',
            'apellido_materno' => 'max:70',
            'direccion' => 'max:70|required',
            'region_id' => 'required',
            'provincia_id' => 'required',
            'comuna_id' => 'required',
            'oficio' => 'max:50',
            'telefonos' => 'max:100',
            'correo_electronico' => 'max:80',
            'isapre_id' => 'required',
        ];
    }
}
