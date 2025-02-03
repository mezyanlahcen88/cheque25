<?php

namespace Modules\Client\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'picture' => ['bail', 'nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
'ref' => ['bail', 'required', 'string'],
'ice' => ['bail', 'nullable', 'string'],
'name' => ['bail', 'required', 'string'],
'fonction' => ['bail', 'nullable'],
'phone' => ['bail', 'nullable', 'regex:' . RegexEnum::PHONE, 'min:10', 'max:15', Rule::unique('clients', 'phone')->ignore($this->client), 'string'],
'fax' => ['bail', 'nullable', 'string'],
'email' => ['bail', 'nullable', 'regex:' . RegexEnum::EMAIL, Rule::unique('clients', 'email')->ignore($this->client), 'string'],
'state_id' => ['bail', 'nullable', 'integer'],
'city_id' => ['bail', 'nullable', 'integer'],
'secteur_id' => ['bail', 'nullable', 'integer'],
'cd_postale' => ['bail', 'nullable', 'string'],
'address' => ['bail', 'nullable', 'string'],
'comment' => ['bail', 'nullable', 'string'],


        ];
    }
}
