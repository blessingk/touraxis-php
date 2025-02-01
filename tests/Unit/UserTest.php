<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function test_can_create_user()
    {
        $data = [
            'username' => fake()->userName(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
        ];
        $response = $this->postJson('/api/users', $data);
        $response->assertStatus(201);
        $response->assertJson([
            'first_name' => $data['first_name'],
            'username' => $data['username'],
            'last_name' => $data['last_name'],
        ]);
    }

    public function test_can_list_users()
    {
        $response = $this->getJson('/api/users');
        $response->assertStatus(200);
    }

    public function test_can_get_user_by_id()
    {
        $user = User::factory()->create();
        $response = $this->getJson('/api/users/'.$user->id);
        $response->assertStatus(200);
        $response->assertJson([
            'first_name' => $user->first_name,
            'username' => $user->username,
            'last_name' => $user->last_name,
        ]);
    }

    public function test_can_user_not_found()
    {
        $response = $this->getJson('/api/users/99999999999999999');
        $response->assertStatus(404);
        $response->assertJson([
            'error' => 'Resource not found',
        ]);
    }
}
