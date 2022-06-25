<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('permission_create') || Gate::allows('permission_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', 'unique:permissions'],
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['name'] = ['required', 'string', 'max:255', Rule::unique('permissions')->ignore($this->permission->id)];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama hak akses wajib diisi',
        ];
    }
}
