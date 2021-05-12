<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SemesterStoreRequest extends FormRequest
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
        //dd($this->request->all());
        return [
            'start_year' => 'required|numeric|digits:4',
            'end_year' => 'required|numeric|digits:4',
            'semester' => 'required|numeric|digits:1|in:1,2'
        ];
    }
}