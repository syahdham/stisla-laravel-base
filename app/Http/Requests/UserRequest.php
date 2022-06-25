<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['required'],
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['password'] = '';
            $rules['name'] = ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user->id)];
            $rules['email'] = ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id)];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Nama sudah terdaftar',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password konfirmasi tidak cocok',
            'roles.required' => 'Jabatan wajib diisi',
        ];
    }
}
