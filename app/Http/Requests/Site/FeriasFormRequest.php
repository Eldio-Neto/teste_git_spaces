<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class FeriasFormRequest extends FormRequest
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
    		'inicio_aquisicao'			=> 'required|date',
    		'termino_aquisicao'			=> 'required|date|after:inicio_aquisicao',
    		'inicio_gozo'				=> 'required|date|after:termino_aquisicao',
    		'termino_gozo'				=> 'required|date|after:inicio_gozo',
    		'Contratos_idContratos'		=> 'required|exists:Contratos,id'
        ];
    }
}
