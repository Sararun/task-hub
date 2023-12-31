<?php

namespace App\Http\Requests\Auth;

use App\Interfaces\Requests\LoginRequestInterface;
use App\Models\User;
use App\Traits\Requests\LoginRequestTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class LoginRequest extends FormRequest implements LoginRequestInterface
{
    use LoginRequestTrait;

    public $stopOnFirstFailure  = true;

    final public function rules(): array
    {
        return [
            'email' => $this->getEmailRules(),
            'password' => $this->getPasswordRules(),
        ];
    }

    final public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $valid): void {
            if ($valid->errors()->isNotEmpty()) {
                LoginRequest::failed();
            }
            $passwordCheckRule = function (): bool {
                $user = User::firstWhere('email', $this->email);
                if ($user != null && Hash::check($this->password, $user->password)) {
                    return true;
                }
                return false;
            };
            if (!$passwordCheckRule()) {
                LoginRequest::failed();
            }
        });
    }

    final public static function failed(): void
    {
        $response = response()->json([
            'message' => 'The email or password is incorrect.',
        ], 422);

        throw new HttpResponseException($response);
    }
}
