<?php

namespace App\Http\Requests\Site\Gestao;

use Illuminate\Foundation\Http\FormRequest;

class TipoSolicitacaoFormRequest extends FormRequest
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
            'description'		=> 'required|min:3|max:45'
        ];
    }
}
