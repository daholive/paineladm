<?php

namespace paineladm\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionarioRequest extends FormRequest
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
            'nome' => 'required|min:3',
            'email' => 'required|max:100',
            'telefone' => 'required|max:100',
            'cpf' => 'required|max:11',
        ];
    }

    public function messages() {
        return [
            'required' => 'O :attribute é obrigatório!'
        ];
    }
}
