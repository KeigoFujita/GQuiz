<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class SubmitQuizFormRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'answers' => 'required|array',
            'answers.*' => 'required'
        ];
    }

    public function messages(): array
    {
       $messages = [];
        foreach ($this->request->get('answers') as $line => $requestData) {
            $messages['answers.' . $line  . '.required'] = 'The answer on question ' . str_ireplace('_', ' ', $line + 1) .'  is missing!';
        }
       return $messages;
    }

}
