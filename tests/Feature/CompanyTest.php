<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use App\Models\Company;

class CompanyTest extends TestCase
{
    /** @test */
    public function a_company_can_be_created_by_admin(){

        $this->withoutExceptionHandling();

        $response = $this->actingAs(User::first())->post('/company', [
            'logo' => 'http://localhost:8000/storage/default.png',
            'name' => 'test company',
            'email' => 'testcompany@admin.com',
            'website' => 'testcompany.com'
        ]);

        $this->assertCount(1, Company::where('name', '=', 'test company')->get());

    }

    public function all_input_fields_are_required(){

        $response = $this->actingAs(User::first())->post('/company', [
            'logo' => 'http://localhost:8000/storage/default.png',
            'name' => 'test company',
            'email' => '',
            'website' => 'testcompany.com'
        ]);

        $response->assertSessionHasErrors('email');

    }


    //  ./vendor/bin/phpunit --filter all_input_fields_are_required

}
