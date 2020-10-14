<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;

use App\Models\User;
use App\Models\Company;

class CompanyTest extends TestCase
{
    /** @test */
    public function a_company_can_be_created_by_admin(){

        $this->withoutExceptionHandling();

        $response = $this->actingAs(User::first())->post('/company', [
            'logo' => UploadedFile::fake()->image('file.png', 600, 600),
            'name' => 'test company',
            'email' => 'testcompany@admin.com',
            'website' => 'testcompany.com'
        ]);

        $this->assertCount(1, Company::where('name', '=', 'test company')->get());

    }

    /** @test */
    public function all_input_fields_in_company_are_required(){

        $response = $this->actingAs(User::first())->post('/company', [
            'logo' => UploadedFile::fake()->image('file.png', 600, 600),
            'name' => 'test company',
            'email' => '',
            'website' => 'testcompany.com'
        ]);

        $response->assertSessionHasErrors('email');

    }

    /** @test */
    public function a_company_can_be_edited_by_admin(){

        // $this->withoutExceptionHandling();

        $response = $this->actingAs(User::first())->patch('/company/' . Company::all()->last()->id, [
            'logo' => UploadedFile::fake()->image('photo1.jpg'),
            'name' => 'updated test company',
            'email' => 'testcompany@admin.com',
            'website' => 'testcompany.com'
        ]);

        $response->assertStatus(302);

    }

    /** @test */
    public function a_company_can_be_deleted_by_admin(){

        $this->withoutExceptionHandling();

        $response = $this->actingAs(User::first())->delete('/company/' . Company::all()->last()->id);

        $response->assertStatus(302);

    }


    //  ./vendor/bin/phpunit --filter a_company_can_be_deleted_by_admin

}
