<?php

namespace App\Http\Requests\Auth;

use App\Traits\Requests\RequestValidationError;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use RequestValidationError;

    public $stopOnFirstFailure = true;

    final public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'name' => ['required', 'string', 'max:254']
        ];
    }
}
