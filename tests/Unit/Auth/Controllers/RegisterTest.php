<?php

namespace Tests\Unit\Auth\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    final public function testUserRegisterSuccess(): void
    {
        $response = $this->postJson(
            '/api/register',
            [
                'email' => 'valid_email@gmail.com',
                'password' => 'password',
                'name' => 'valid_test_name'
            ]
        );

        $response->assertStatus(200)->assertJson(['message' => 'User successfully registered']);
        $response->assertJson(['message' => 'User successfully registered']);

        $this->assertDatabaseHas('users', ['email' => 'valid_email@gmail.com']);
    }
}