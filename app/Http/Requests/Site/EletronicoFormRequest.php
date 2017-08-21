<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class EletronicoFormRequest extends FormRequest
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
        	'Marca'			=> 'required|min:3|max:20',
        	'Modelo'		=> 'required|min:3|max:20',
        	'MAC'			=> 'required|min:3|max:17',
        	'Users_idUsers'	=> 'required|exists:Users,id'
        ];
    }
}
