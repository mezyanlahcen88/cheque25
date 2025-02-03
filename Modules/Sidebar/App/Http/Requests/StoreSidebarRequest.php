<?php

namespace Modules\Sidebar\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class StoreSidebarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'string'],
'icon' => ['bail', 'nullable', 'string'],
'permission' => ['bail', 'required', 'string'],
'sidebar_id' => ['bail', 'nullable', 'string'],
'order' => ['bail', 'nullable', 'integer'],
'route' => ['bail', 'nullable', 'string'],
'type' => ['bail', 'nullable', 'string'],

        ];
    }
}
