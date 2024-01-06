<?php

namespace Tests\Unit\Auth\Requests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\EmailTrait;
use Tests\Traits\NameTrait;
use Tests\Traits\PasswordTrait;

class RegisterRequestTest extends TestCase
{
    use RefreshDatabase;
    use EmailTrait;
    use PasswordTrait;
    use NameTrait;

    private string $route = 'api/register';

    final public function testEmailOfUserIsUnique(): void
    {
        $user = User::factory()->create();
        $response = $this->postJson($this->getRoute(), ['email' => $user->email]);
        $response->assertStatus(422)->assertJsonPath('errors.email.0', 'The email has already been taken.');
    }

    final public function getRoute(): string
    {
        return $this->route;
    }
}
