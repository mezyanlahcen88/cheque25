<?php

namespace Modules\Permission\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

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
