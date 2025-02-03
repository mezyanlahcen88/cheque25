<?php

namespace Modules\Bank\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class UpdateBankRequest extends FormRequest
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
            'logo' => ['bail', 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
'picture' => ['bail', 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
'effet' => ['bail', 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
'name' => ['bail', 'required', 'string'],
'tel' => ['bail', 'required', 'string'],
'address' => ['bail', 'required', 'string'],

        ];
    }
}
?>
