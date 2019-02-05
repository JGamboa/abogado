<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexIntervinienteRequest extends FormRequest
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

    public function rules()
    {
        return [];
    }

    public function getValidatorInstance()
    {
        $data = $this->all();

        if(isset($data['rut'])){
            $data['rut'] = str_replace(".", "", $data['rut']);
            $this->getInputSource()->replace($data);
        }

        /*modify data before send to validator*/

        return parent::getValidatorInstance();
    }

}
