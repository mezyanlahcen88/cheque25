<?php

namespace Modules\Exercice\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreExerciceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'exercice' => ['bail', 'required', 'string'],
'etat' => ['bail', 'required', 'string'],
'comment' => ['bail', 'nullable', 'string'],

        ];
    }
}
