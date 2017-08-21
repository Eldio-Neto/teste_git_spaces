<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class AdvertenciaFormRequest extends FormRequest
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
            'data'						=> 'required|date',
        	'motivo'					=> 'required|min:5|max:50',
        	'Contratos_idContratos'		=> 'required|exists:Contratos,id'
        ];
    }
}
