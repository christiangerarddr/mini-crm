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
            'email' => 'test2@admin.com',
            'password' => 'password',
        ]);

        $this->assertCount(2, User::all());

    }

    /** @test */
    public function a_user_can_be_edited_by_admin(){

        $this->withoutExceptionHandling();

        $response = $this->patch('/user/' . User::all()->last()->id, [
            'name' => 'test updated user',
            'email' => 'test2@admin.com',
            'password' => 'password',
        ]);

        $this->assertEquals('test updated user', User::all()->last()->name);

    }

    /** @test */
    public function all_input_fields_are_required(){

        $response = $this->post('/user', [
            'name' => 'test user',
            'email' => '',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('email');

    }

    //  ./vendor/bin/phpunit --filter a_user_can_be_edited_by_admin

}
