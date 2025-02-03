<?php

namespace Modules\Role\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return        [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ];

    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
             'name.required' => 'The role field is required',
            'permissions.required' => 'Please select at least one permission.',

        ];
    }


    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
