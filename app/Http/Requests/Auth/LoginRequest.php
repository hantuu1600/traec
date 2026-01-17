<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Cek otorisasi user (default true dulu).
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Rule validasi untuk semua input login.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'login_id' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Pesan error custom biar lebih enak dibaca user.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'login_id.required' => 'Mohon masukkan Email atau NIDN Anda.',
            'password.required' => 'Password tidak boleh kosong.',
        ];
    }
}
