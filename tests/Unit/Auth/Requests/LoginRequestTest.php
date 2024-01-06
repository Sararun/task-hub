<?php

namespace Tests\Unit\Auth\Requests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\EmailTrait;
use Tests\Traits\PasswordTrait;

class LoginRequestTest extends TestCase
{
    use RefreshDatabase;
    use EmailTrait;
    use PasswordTrait;

    private string $route = 'api/login';

    final public function testUserIsUndefinedFailure(): void
    {
        $user = User::factory()->create();
        $response = $this->postJson($this->getRoute(), [
            'email' => $user->email,
            'password' => $user->password
        ]);
        $response->assertStatus(422)->assertJsonPath(
            'errors.email.0',
            'The email or password is not correct.'
        );
    }

    final public function getRoute(): string
    {
        return $this->route;
    }
}
