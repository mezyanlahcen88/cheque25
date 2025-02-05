<?php

namespace Modules\Product\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'picture' => ['bail', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
'reference' => ['bail', 'required', 'string'],
'product_type' => ['bail', 'required', 'string'],
'service' => ['bail', 'required', 'string'],
'buy_unit' => ['bail', 'required', 'string'],
'buy_price' => ['bail', 'required', 'numeric'],
'actions' => ['bail', 'required', 'string'],
'lot_number' => ['bail', 'required', 'string'],
'date_of_expiration' => ['bail', 'required', 'date_format:Y-m-d H:i:s'],
'destockage_unit' => ['bail', 'required', 'string'],
'category_id' => ['bail', 'required', 'string'],
'brand_id' => ['bail', 'required', 'string'],
'warehouse_id' => ['bail', 'required', 'string'],
'iscomposable' => ['bail', 'nullable', 'boolean'],

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
