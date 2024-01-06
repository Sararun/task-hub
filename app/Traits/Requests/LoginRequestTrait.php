<?php

namespace App\Traits\Requests;

trait LoginRequestTrait
{
    final public function getEmailRules(): array
    {
        return ['required', 'email'];
    }

    final public function getPasswordRules(): array
    {
        return ['required', 'string', 'min:8'];
    }
}
