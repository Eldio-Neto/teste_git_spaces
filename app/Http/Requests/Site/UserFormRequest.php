<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        		'email'							=> 'nullable|email|max:70',
        		'password'						=> 'nullable|max:30',
        		'first_name'					=> 'required|max:30',
        		'last_name'						=> 'nullable|max:30',
        		
        		'EstadoCivils_idEstadoCivils'	=> 'nullable|exists:Estado_Civils,id',
        		'data_nascimento'				=> 'nullable|date',
        		'genero'						=> 'required',
        		
        		'phone'							=> 'nullable|min:8|max:16', 
        		'mobile'						=> 'nullable|min:8|max:16',
        		
        		'CPF'							=> 'required|min:11|max:14',
        		'RG'							=> 'required|min:7|max:20',
        		'Emissor'						=> 'required|min:2|max:10', 
        		'PIS'							=> 'nullable|min:5|max:15', 
        		'titulo'						=> 'nullable|min:5|max:20',
        		'titulo_zona'					=> 'nullable|min:2|max:5',
        		'titulo_secao'					=> 'nullable|min:2|max:5',
        		'CTPS'							=> 'nullable|min:2|max:10',
        		'CTPS_serie'					=> 'nullable|min:2|max:6',
        		'CTPS_uf'						=> 'nullable|min:2|max:6', 
        		'CTPS_emissao'					=> 'nullable|date',
        		'CNH'							=> 'nullable|min:2|max:15',
        		'CNH_categoria'					=> 'nullable|min:2|max:15',
        		'CNH_validade'					=> 'nullable|date',
        		
        		'nome_pai'						=> 'nullable|min:3|max:45',
        		'nome_mae'						=> 'nullable|min:3|max:45',
        		
        		'Enderecos_idEnderecos'			=> 'nullable|exists:Enderecos,id'
        ];
    }
}
