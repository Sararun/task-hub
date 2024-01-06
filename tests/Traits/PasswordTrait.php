<?php

namespace Tests\Traits;

trait PasswordTrait
{
    public string $safePassword = '1111233333333332';

    final public function testPasswordRequiredFailure(): void
    {
        $response = $this->postJson($this->getRoute(), [
            'email' => $this->safeEmail
        ]);
        $response->assertStatus(422)->assertJsonPath(
            'errors.password.0',
            'The password field is required.'
        );
    }

    //TODO:: Think about the reason why more than one error is coming, given that it is set to not give more than one error.
    final public function testPasswordIsNotStringFailure(): void
    {
        $response = $this->postJson($this->getRoute(), [
            'email' => $this->safeEmail,
            'password' => 12312312312313123132231
        ]);
        $response->assertStatus(422)->assertJsonPath(
            'errors.password.0',
            'The password field must be a string.'
        );
    }

    final public function testPasswordIsMinLength(): void
    {
        $response = $this->postJson(route('login'), [
            'email' => $this->safeEmail,
            'password' => '123312'
        ]);
        $response->assertStatus(422)->assertJsonPath(
            'errors.password.0',
            'The password field must be at least 8 characters.'
        );
    }
}
