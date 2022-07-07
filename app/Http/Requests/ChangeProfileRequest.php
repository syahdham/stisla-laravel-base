<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ChangeProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->profile->id)]
        ];
    }

    public function messages()
    {
        return[
            "email.required"    => 'Email wajib diisi',
            "email.email"       => 'Format email masih salah',
            "email.max"         => 'Email Maksimum 255 karakter',
            "email.unique"      => 'Email sudah terdaftar'
        ];
    }
}
