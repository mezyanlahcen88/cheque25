<?php

namespace Modules\Warehouse\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreWarehouseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'string'],
            'type' => ['bail', 'required', 'string'],
            'address' => ['bail', 'nullable', 'string'],
        ];
    }
}
