<?php

namespace Modules\Sidebar\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\RegexEnum;
use Illuminate\Validation\Rule;

class UpdateSidebarRequest extends FormRequest
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
'icon' => ['bail', 'nullable', 'string'],
'permission' => ['bail', 'required', 'string'],
'sidebar_id' => ['bail', 'nullable', 'string'],
'order' => ['bail', 'nullable', 'integer'],
'route' => ['bail', 'nullable', 'string'],
'type' => ['bail', 'nullable', 'string'],

        ];
    }
}
?>
