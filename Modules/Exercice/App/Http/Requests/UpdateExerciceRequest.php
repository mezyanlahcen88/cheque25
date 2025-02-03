<?php

namespace Modules\Exercice\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class UpdateExerciceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {


        return [
            'exercice' => ['bail', 'required', 'string'],
'etat' => ['bail', 'required', 'string'],
'comment' => ['bail', 'nullable', 'string'],

        ];
    }
}
?>
