<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class SolicitacaoFormRequest extends FormRequest
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
    			'Users_idUsers'							=> 'required|exists:Users,id',
    			'TipoSolicitacaos_idTipoSolicitacaos'	=> 'required|exists:Tipo_Solicitacaos,id',
    			'status'								=> 'nullable',
    			'resposta'								=> 'nullable',
        		//Valida ID 1 - Justificativa Falta
        		'data_falta'							=> 'required_if:TipoSolicitacaos_idTipoSolicitacaos,1',
        		//Valida ID 2 - Adiantamento R$
        		'valor'									=> 'required_if:TipoSolicitacaos_idTipoSolicitacaos,2',
        		'data_retirada'							=> 'required_if:TipoSolicitacaos_idTipoSolicitacaos,2',
        		//Valida ID 1 - Retirada Uniforme
    			'data_retirada'							=> 'required_if:TipoSolicitacaos_idTipoSolicitacaos,3',
    			'detalhes'								=> 'required_if:TipoSolicitacaos_idTipoSolicitacaos,3'
        ];
    }
}
