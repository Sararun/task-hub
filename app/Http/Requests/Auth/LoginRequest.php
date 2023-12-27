<?php

namespace App\Http\Requests\Auth;

use App\Http\RequestRules\PasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    final public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', new PasswordCheckRule($this->email)],
        ];
    }
}
