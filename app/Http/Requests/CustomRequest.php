<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomREquest extends FormRequest
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
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
        ];
    }
 
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'senha.required' => 'Você precisa criar uma senha',
        ];
    }
}