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

        $response = $this->actingAs(User::first())->post('/user', [
            'name' => 'user',
            'email' => 'user@admin.com',
            'password' => 'password',
        ]);

        $this->assertCount(2, User::all());

    }

    /** @test */
    public function a_user_can_be_edited_by_admin(){

        $this->withoutExceptionHandling();

        $response = $this->actingAs(User::first())->patch('/user/' . User::all()->last()->id, [
            'name' => 'updated user',
            'email' => 'user@admin.com',
            'password' => 'password',
        ]);

        $this->assertEquals('updated user', User::all()->last()->name);

    }

    /** @test */
    public function all_input_fields_in_user_are_required(){

        $response = $this->actingAs(User::first())->post('/user', [
            'name' => 'test user',
            'email' => '',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors(['email']);

    }

    /** @test */
    public function a_user_can_be_deleted_by_admin(){

        $this->withoutExceptionHandling();

        $response = $this->actingAs(User::first())->delete('/user/' . User::all()->last()->id);

        $response->assertOk();

    }

    //  ./vendor/bin/phpunit --filter all_input_fields_are_required

}
