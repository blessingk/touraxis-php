<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class TaskTest extends TestCase
{

    /**
     * A basic unit test example.
     */
    public function test_can_create_task()
    {
        $user = User::factory()->create();
        $response = $this->postJson("/api/users/{$user->id}/tasks", [
            'name' => 'Test Task',
            'description' => 'Task Description',
            'next_execute_date_time' => now()->addHour()->format('Y-m-d H:i:s'),
        ]);
        $response->assertStatus(201);
        $response->assertJson([
            'name' => 'Test Task',
            'description' => 'Task Description',
        ]);
    }

    public function test_can_list_tasks()
    {
        $user = User::factory()->create();
        $response = $this->getJson("/api/users/{$user->id}/tasks");
        $response->assertStatus(200);
    }
}
