<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_can_create_user()
    {
        $response = $this->postJson('/api/users', [
            'username' => 'johndoe',
            'first_name' => 'John',
            'last_name' => 'Doe'
        ]);
        $response->dd();
        $response->assertStatus(201);

    }

    public function test_can_list_users()
    {
        $response = $this->getJson('/api/users');
        $response->assertStatus(200);
    }

    public function test_can_get_user_by_id()
    {
        $response = $this->getJson('/api/users/1');
        $response->dd();
        $response->assertStatus(200);
    }
}
