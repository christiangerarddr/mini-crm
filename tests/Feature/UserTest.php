<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;

class UserTest extends TestCase
{
    /** @test */
    public function a_user_can_be_created_by_admin(){

        $this->withoutExceptionHandling();
        $response = $this->post('/user', [
            'name' => 'test user',
            'email' => 'test@admin.com',
            'password' => 'password',
        ]);

        $response->assertOk();
        $this->assertCount(2, User::all());

    }

}
