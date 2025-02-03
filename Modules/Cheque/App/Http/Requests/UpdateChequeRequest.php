<?php

namespace Modules\Cheque\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class UpdateChequeRequest extends FormRequest
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
            'bank_id' => ['bail', 'required', 'string'],
'compte_id' => ['bail', 'required', 'string'],
'carnet_id' => ['bail', 'required', 'string'],
'series' => ['bail', 'required', 'string'],
'number' => ['bail', 'required', 'string'],
'amount' => ['bail', 'required', 'string'],
'doi' => ['bail', 'required', 'date_format:Y-m-d H:i:s'],
'poi' => ['bail', 'required', 'string'],
'beneficiary' => ['bail', 'required', 'string'],
'status' => ['bail', 'required', 'string'],

        ];
    }
}
?>
