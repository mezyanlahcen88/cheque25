<?php

namespace Modules\Bank\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreBankRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'logo' => ['bail', 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
'picture' => ['bail', 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
'effet' => ['bail', 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
'name' => ['bail', 'required', 'string'],
'tel' => ['bail', 'required', 'string'],
'address' => ['bail', 'required', 'string'],

        ];
    }
}
