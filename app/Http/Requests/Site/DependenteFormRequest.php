<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class DependenteFormRequest extends FormRequest
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
    		'first_name'						=> 'required|min:3|max:30',
    		'last_name'							=> 'required|min:3|max:30',
    		'data_nascimento'					=> 'nullable|date',
    		'obsevacao'							=> 'nullable|min:3|max:100',
    		'TipoDependentes_idTipoDependentes'	=> 'required|exists:tipo_dependentes,id',
    		'Users_idUsers'						=> 'required|exists:Users,id'
        ];
    }
}
