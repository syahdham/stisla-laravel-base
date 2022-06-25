<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('user_create') || Gate::allows('user_edit');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', 'unique:roles'],
            'permissions' => ['required']
            ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['name'] = ['required', 'string', 'max:255', Rule::unique('roles')->ignore($this->role->id)];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama jabatan wajib diisi',
            'name.unique' => 'Nama sudah terdaftar',
            'permissions' => 'Hak akses wajib diisi'
        ];
    }
}
