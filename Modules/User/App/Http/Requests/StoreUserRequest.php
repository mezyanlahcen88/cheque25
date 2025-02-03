<?php

namespace Modules\User\App\Http\Requests;

use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'first_name' => ['bail', 'required', 'min:3', 'max:50'],
            'last_name' => ['bail', 'required', 'min:3', 'max:50'],
            'occupation' => ['bail', 'nullable', 'min:3', 'max:50'],
            'language_id' => ['bail', 'nullable'],
            'country_id' => ['bail', 'nullable'],
            'state' => ['bail', 'nullable'],
            'city' => ['bail', 'nullable'],
            'email' => ['required', 'regex:'.RegexEnum::EMAIL, Rule::unique('users', 'email')->ignore($this->user)],
            'phone' => ['nullable','regex:'.RegexEnum::PHONE,'min:10','max:15',Rule::unique('users', 'phone')->ignore($this->user)],
            'address' => ['bail', 'nullable'],
            'code_postale' => ['bail', 'nullable'],
            'gender' => ['bail', 'required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => 'required|same:password',

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
            'roles_name.required_if' => 'Please select one role.',

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
