<?php

namespace Modules\Supplier\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'picture' => ['bail', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'ice' => ['bail', 'required', 'string'],
            'name' => ['bail', 'required', 'string'],
            'fonction' => ['bail', 'nullable', 'integer'],
            'phone' => ['bail', 'nullable', 'regex:' . RegexEnum::PHONE, 'min:10', 'max:15', Rule::unique('suppliers', 'phone')->ignore($this->supplier), 'string'],
            'fax' => ['bail', 'nullable', 'string'],
            'email' => ['bail', 'nullable', 'regex:' . RegexEnum::EMAIL, Rule::unique('suppliers', 'email')->ignore($this->supplier), 'string'],
            'state_id' => ['bail', 'nullable', 'integer'],
            'city_id' => ['bail', 'nullable', 'integer'],
            'secteur_id' => ['bail', 'nullable', 'integer'],
            'cd_postale' => ['bail', 'nullable', 'string'],
            'address' => ['bail', 'nullable', 'string'],
            'comment' => ['bail', 'nullable', 'string'],
        ];
    }
}
