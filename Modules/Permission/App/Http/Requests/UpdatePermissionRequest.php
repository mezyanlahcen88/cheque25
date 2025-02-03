<?php

namespace Modules\Permission\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePermissionRequest extends FormRequest
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
            'name' => 'bail|required|string',
'libele' => 'bail|required|string',
'guard_name' => 'bail|required|string',
'groupe_id' => 'bail|nullable|integer',

        ];
    }
}
?>
