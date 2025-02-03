<?php

namespace Modules\Site\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreSiteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'string'],
'longitude' => ['bail', 'required', 'string'],
'latitude' => ['bail', 'required', 'string'],

        ];
    }
}
