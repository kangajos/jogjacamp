<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_list_without_param(): void
    {
        $response = $this->get('/api');

        $response->assertOk();
    }

    public function test_create(): void
    {
        $response = $this->post(
            '/api',
            ['name' => 'test_name', 'is_publish' => true]
        );

        $response->assertOk();
    }

    public function test_find(): void
    {
        $response = $this->get('/api/3');

        $response->assertOk();
    }

    public function test_update(): void
    {
        $response = $this->put(
            '/api/3',
            ['name' => 'test_name_edited']
        );

        $response->assertOk();
    }

    public function test_delete(): void
    {
        $response = $this->delete(
            '/api/3',
        );

        $response->assertOk();
    }
}
