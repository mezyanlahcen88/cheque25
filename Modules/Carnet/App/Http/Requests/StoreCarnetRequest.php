<?php

namespace Modules\Carnet\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreCarnetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bank_id' => ['bail', 'required', 'string'],
            'compte_id' => ['bail', 'required', 'string'],
            'nbr_cheque' => ['bail', 'required', 'integer'],
            'society' => ['bail', 'required', 'string'],
            'series' => ['bail', 'required', 'string'],
            'nbr_first_cheque' => ['bail', 'required', 'string'],
            'nbr_last_cheque' => ['bail', 'required', 'string'],
        ];
    }
}
