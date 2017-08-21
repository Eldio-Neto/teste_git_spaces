<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoFormRequest extends FormRequest
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
        	'CEP'				=> 'nullable|min:5|max:12', 
        	'Logradouro'		=> 'nullable|min:5|max:60',
        	'Bairro'			=> 'nullable|min:5|max:40',
        	'Cidade'			=> 'nullable|min:5|max:40',
        	'UFs_idUFs'			=> 'required|exists:ufs,id'
        ];
    }
}
