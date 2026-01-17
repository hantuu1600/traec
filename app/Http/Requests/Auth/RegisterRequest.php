<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Menentukan apakah pengguna diizinkan untuk membuat permintaan ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Mendapatkan aturan validasi yang berlaku untuk permintaan.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'nidn' => ['required', 'numeric', 'min_digits:6', 'unique:users,nidn'],
            'prodi' => ['required', 'string'],
            'faculty' => ['required', 'string'],
            'position' => ['required', 'string'],
            'phonenumber' => ['required', 'string', 'min:10', 'max:15'], // Disesuaikan max digit untuk kewajaran
        ];
    }

    /**
     * Mendapatkan atribut kustom untuk kesalahan validator.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'nidn' => 'NIDN',
            'prodi' => 'Program Studi',
            'phonenumber' => 'Nomor Telepon',
        ];
    }
}
