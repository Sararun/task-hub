<?php

namespace Tests\Unit\Auth\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    final public function testUserLoginSuccess(): void
    {
        $user = User::factory()->create();
        $response = $this->postJson('/api/login', ['email' => $user->email, 'password' => 'password']);

        $response->assertStatus(200)
            ->assertJson(['message' => 'User successfully authorized.'])
            ->assertJsonStructure(['token']);
        
        $this->assertTrue(Auth::check());
    }
}