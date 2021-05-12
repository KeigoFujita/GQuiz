<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'lrn' => 'required|numeric|digits:12|unique:students,lrn,' . $this->student->id,
            'gender' => 'required',
            'section'=>'required|exists:sections,id',
            'grade_level' => 'required|numeric|digits:2|in:11,12',
            'gender' => 'required|in:male,female'
        ];
    }
}