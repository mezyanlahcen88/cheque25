<?php

namespace Modules\Numerotation\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreNumerotationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'doc_type' => ['bail', 'required', 'string'],
'prefix' => ['bail', 'required', 'string'],
'increment_num' => ['bail', 'required', 'integer'],
'comment' => ['bail', 'nullable', 'string'],

        ];
    }
}
