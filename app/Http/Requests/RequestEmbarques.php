<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RequestEmbarques extends Request
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
        return [
            'fecha' => 'required|date',
            'peso'=>'required',
            'codigo'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'fecha.required'=>'Por favor complete la fecha',
            'fecha.date'=>'Formato incorrecto de fecha',

            'peso.required'=>'Campo peso requerido',

            'codigo.required'=>'Campo codigo requerido',

        ];
    }
}
