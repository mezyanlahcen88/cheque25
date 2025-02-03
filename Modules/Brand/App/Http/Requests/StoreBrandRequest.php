<?php

namespace Modules\Brand\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreBrandRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'string'],
'picture' => ['bail', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],

        ];
    }

        // public function messages(): array
    // {
    //     return [
    //         'start_date.required_if' => ':attribute cannot be empty.',
    //         'delivery_date.required_if' => ':attribute cannot be empty.',
    //         'count_tranche.required_if' => ':attribute cannot be empty.',
    //         'delivery_date.after' => 'The delivery date must be after the start date when the project is not tranchable.',
    //     ];
    // }

    // public function withValidator($validator)
    // {
    //     $validator->sometimes('count_tranche', ['integer', 'min:2', 'max:5'], function ($input) {
    //         return $input->tranchable == 1;
    //     });
    //     $validator->sometimes('delivery_date', ['after:start_date'], function ($input) {
    //         return $input->tranchable == 0;
    //     });
    // }
}
