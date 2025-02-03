<?php

namespace Modules\Compte\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class UpdateCompteRequest extends FormRequest
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
            'type_compte' => ['bail', 'required', 'string'],
'bank_id' => ['bail', 'required', 'string'],
'society_id' => ['bail', 'nullable', 'string'],
'agence' => ['bail', 'required', 'string'],
'city' => ['bail', 'required', 'string'],
'rip' => ['bail', 'required', 'string'],
'start_solde' => ['bail', 'required', 'string'],
'start_date' => ['bail', 'required', 'date_format:Y-m-d H:i:s'],
'comment' => ['bail', 'nullable', 'string'],

        ];
    }
}
?>
