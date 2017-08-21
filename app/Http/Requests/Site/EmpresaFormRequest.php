<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaFormRequest extends FormRequest
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
        		'fantasia'							=> 'required',
        		'CNPJ'								=> 'required',
        		'razao_social'						=> 'required',
        		'abreviacao'						=> 'nullable',
        		'phone'								=> 'nullable',
        		'mobile'							=> 'nullable',
        		'CEP'								=> 'nullable',
        		'Logradouro'						=> 'nullable',
        		'Bairro'							=> 'nullable',
        		'Cidade'							=> 'nullable',
        		'UFs_idUFs'							=> 'required|exists:ufs,id'
        ];
    }
}
