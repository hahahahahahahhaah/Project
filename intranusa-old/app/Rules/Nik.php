<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Nik implements Rule
{
    public function passes($attribute, $value)
    {
        // Validasi NIK: misalnya harus terdiri dari 16 digit angka
        return preg_match('/^\d{16}$/', $value);
    }

    public function message()
    {
        return 'NIK harus terdiri dari 16 digit angka.';
    }
}
