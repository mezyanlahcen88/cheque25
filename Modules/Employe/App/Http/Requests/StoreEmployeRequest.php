<?php

namespace Modules\Employe\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreEmployeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => ['bail', 'required', 'string'],
'last_name' => ['bail', 'required', 'string'],
'doe' => ['bail', 'required', 'date'],

        ];
    }
}
