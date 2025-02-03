<?php

namespace Modules\Employe\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class UpdateEmployeRequest extends FormRequest
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
            'first_name' => ['bail', 'required', 'string'],
'last_name' => ['bail', 'required', 'string'],
'doe' => ['bail', 'required', 'date'],

        ];
    }
}
?>
