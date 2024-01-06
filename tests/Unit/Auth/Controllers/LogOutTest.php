<?php

namespace Tests\Unit\Auth\Controllers;

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class LogOutTest extends TestCase
{
    final public function testUserLogoutSuccess(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $token = $user->createToken('API TOKEN')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/logout');

        $response->assertStatus(200);

        $this->assertFalse($user->tokens()->where('id', $user->currentAccessToken()->id)->exists());
    }
}
