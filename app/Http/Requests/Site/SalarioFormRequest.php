<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class SalarioFormRequest extends FormRequest
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
        	'salario'					=> 'required|numeric',
        	'motivo'					=> 'required|min:3|max:45',
        	'Cargos_idCargos'			=> 'nullable|exists:Cargos,id',
        	'CBO'						=> 'required|min:1|max:11',
        	'Contratos_idContratos'		=> 'required|exists:Contratos,id'
        ];
    }
}
