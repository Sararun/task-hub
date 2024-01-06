<?php

namespace App\Http\Requests\Auth\Test;

use App\Interfaces\Requests\LoginRequestInterface;
use App\Models\User;
use App\Traits\Requests\LoginRequestTrait;
use App\Traits\Requests\RequestValidationError;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class LoginRequestTest extends FormRequest implements LoginRequestInterface
{
    use LoginRequestTrait;
    use RequestValidationError;

    public $stopOnFirstFailure = true;

    final public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    final public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $valid): void {
            if ($valid->errors()->isNotEmpty()) {
                $this->failedValidation($valid);
            }
            $passwordCheckRule = function (): bool {
                $user = User::firstWhere('email', $this->email);
                if ($user != null && Hash::check($this->password, $user->password)) {
                    return true;
                }
                return false;
            };
            if (!$passwordCheckRule()) {
                $valid->errors()->add('email', 'The email or password is not correct.');

                $this->failedValidation($valid);
            }
        });
    }
}
