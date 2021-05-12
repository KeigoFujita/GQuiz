<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        // if ($this->department_id == 1) {
        //     // dd($this->department_id);
        //     return true;
        // }
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
            'role_name' => 'required|unique:roles,role_name,' . $this->role_id,
            'department_id' => Rule::unique('roles', 'department_id')->ignore($this->role_id)->where(function ($query) {
                return $query->where('department_id', '!=', 'none');
            })
        ];
    }
}