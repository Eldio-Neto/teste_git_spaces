<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ContratoFormRequest extends FormRequest
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
        	'admissao'			=> 'nullable|date',
        	'inicio'			=> 'required|date',
        	'aviso_previo'		=> 'nullable|date',
        	'demissao'			=> 'nullable|date',
        	'cod_colibri'		=> 'nullable|numeric',
        	'cod_contabilidade'	=> 'nullable|numeric',
        	'observacoes'		=> 'nullable',
        	'Users_idUsers'		=> 'required|exists:Users,id'
        ];
    }
}
