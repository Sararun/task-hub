<?php

namespace App\Http\RequestRules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class PasswordCheckRule implements ValidationRule
{

    public function __construct(private string $email)
    {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::firstWhere('email', $this->email);
        if ($user != null && !Hash::check($value, $user->password)) {
            $fail('The email or password is incorrect.');
        }
    }
}
