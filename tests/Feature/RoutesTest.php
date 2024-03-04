<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::first();
        $this->actingAs($this->user);
    }

    public function test_home_route()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_profile_routes()
    {

        $response = $this->get('/profile');
        $response->assertStatus(200);
    }

    public function test_task_routes()
    {

        $response = $this->get('/tasks');
        $response->assertStatus(200);

        $response = $this->get('/tasks/create');
        $response->assertStatus(200);

        $response = $this->get('/tasks/2/edit');
        $response->assertStatus(200);
    }

    public function test_customer_routes()
    {

        $response = $this->get('/customers');
        $response->assertStatus(200);

        $response = $this->get('/customers/create');
        $response->assertStatus(200);

        $response = $this->get('/customers/1/edit');
        $response->assertStatus(200);
    }

    public function test_employee_routes()
    {

        $response = $this->get('/employees');
        $response->assertStatus(200);
        $response = $this->get('/employees/create');
        $response->assertStatus(200);
    }

    public function test_payment_routes()
    {

        $response = $this->get('/payments');
        $response->assertStatus(200);

        $response = $this->get('/payments/create');
        $response->assertStatus(200);

        $response = $this->get('/payments/55/edit');
        $response->assertStatus(200);
    }
}
