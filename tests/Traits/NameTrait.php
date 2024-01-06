<?php

namespace Tests\Traits;

trait NameTrait
{
    final public function testNameRequiredFailure(): void
    {
        $response = $this->postJson($this->getRoute(), [
            'email' => $this->safeEmail,
            'password' => $this->safePassword,
        ]);
        $response->assertStatus(422)->assertJsonPath(
            'errors.name.0',
            'The name field is required.'
        );
    }

    //TODO:: Think about the reason why more than one error is coming, given that it is set to not give more than one error.
    final public function testNameIsNotStringFailure(): void
    {
        $response = $this->postJson($this->getRoute(), [
            'email' => $this->safeEmail,
            'password' => $this->safePassword,
            'name' => 123312312321,
        ]);
        $response->assertStatus(422)->assertJsonPath(
            'errors.name.0',
            'The name field must be a string.'
        );
    }

    final public function testNameMaxLength(): void
    {
        $response = $this->postJson($this->getRoute(), [
            'email' => $this->safeEmail,
            'password' => '123324488188188181812',
            'name' => '11111111111111111111111111111111111111111111111c1111111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf11111111111111111111111111111111111111111111111c11111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqfv111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111ssssssqdddddddddqdcqqfqf'
        ]);
        $response->assertStatus(422)->assertJsonPath(
            'errors.name.0',
            'The name field must not be greater than 254 characters.'
        );
    }
}