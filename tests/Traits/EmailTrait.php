<?php

namespace Tests\Traits;

trait EmailTrait
{
    public string $safeEmail = 'sarosekvlad12@gmail.com';

    abstract public function getRoute(): string;

    final public function testEmailRequiredFailure(): void
    {
        $response = $this->post($this->route);
        $response->assertStatus(422)->assertJsonPath(
            'errors.email.0',
            'The email field is required.'
        );
    }

    final public function testEmailIsNotEmailFailure(): void
    {
        $notSafeEmail = 'sarosekvlad12gmailcom';
        $response = $this->postJson(route('login'), [
            'email' => $notSafeEmail
        ]);
        $response->assertStatus(422)->assertJsonPath(
            'errors.email.0',
            'The email field must be a valid email address.'
        );
    }
}