<?php

namespace Modules\Society\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreSocietyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'site_id' => ['bail', 'required', 'string'],
            'ice' => ['bail', 'nullable', 'string'],
            'name' => ['bail', 'required', 'string'],
            'phone' => ['bail', 'nullable', 'regex:' . RegexEnum::PHONE, 'min:10', 'max:15', Rule::unique('societies', 'phone')->ignore($this->society), 'string'],
            'fax' => ['bail', 'nullable', 'string'],
            'email' => ['bail', 'nullable', 'regex:' . RegexEnum::EMAIL, Rule::unique('societies', 'email')->ignore($this->society), 'string'],
            'state_id' => ['bail', 'nullable', 'integer'],
            'city_id' => ['bail', 'nullable', 'integer'],
            'secteur_id' => ['bail', 'nullable', 'integer'],
            'cd_postale' => ['bail', 'nullable', 'string'],
            'address' => ['bail', 'nullable', 'string'],
            'comment' => ['bail', 'nullable', 'string'],
        ];
    }
}
