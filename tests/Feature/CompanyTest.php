<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Company;

class CompanyTest extends TestCase
{
    /** @test */
    public function a_company_can_be_created_by_admin(){

        $this->withoutExceptionHandling();

        $response = $this->post('/company', [
            'name' => 'user',
            'email' => 'user@admin.com',
            'password' => 'password',
        ]);

        $this->assertCount(2, Company::all());

    }

    public function all_input_fields_are_required(){

        $response = $this->post('/company', [
            'name' => 'test user',
            'email' => '',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('email');

    }


    //  ./vendor/bin/phpunit --filter a_user_can_be_created_by_admin

}
