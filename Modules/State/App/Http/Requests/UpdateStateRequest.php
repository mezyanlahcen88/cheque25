<?php

namespace Modules\State\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class UpdateStateRequest extends FormRequest
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
            'name' => ['bail', 'required', 'string'],

        ];
    }
        // public function messages(): array
    // {
    //     return [
    //         'start_date.required_if' => ':attribute cannot be empty.',
    //         'delivery_date.required_if' => ':attribute cannot be empty.',
    //         'count_tranche.required_if' => ':attribute cannot be empty.',
    //         'delivery_date.after' => 'The delivery date must be after the start date when the project is not tranchable.',
    //     ];
    // }

    // public function withValidator($validator)
    // {
    //     $validator->sometimes('count_tranche', ['integer', 'min:2', 'max:5'], function ($input) {
    //         return $input->tranchable == 1;
    //     });
    //     $validator->sometimes('delivery_date', ['after:start_date'], function ($input) {
    //         return $input->tranchable == 0;
    //     });
    // }
}
?>
