<?php

namespace App\Interfaces\Requests;

use Illuminate\Validation\Validator;

interface LoginRequestInterface
{
    public function rules(): array;

    public function getPasswordRules(): array;

    public function getEmailRules(): array;

    public function withValidator(Validator $validator): void;
}
