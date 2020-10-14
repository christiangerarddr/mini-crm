<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use App\Models\Employee;

class EmployeeTest extends TestCase
{
    /** @test */
    public function an_employee_can_be_created_by_admin()
    {
        $this->withoutExceptionHandling();

        $response = $this->actingAs(User::first())->post('/employee', [
            'first_name' => 'test employee',
            'last_name' => 'test employee',
            'email' => 'testemployee@admin.com',
            'phone' => '09268740496',
            'company_id' => 1,
        ]);

        $this->assertCount(1, Employee::where('first_name', '=', 'test employee')->get());

    }

    /** @test */
    public function en_employee_can_be_edited_by_admin(){

        $this->withoutExceptionHandling();

        $response = $this->actingAs(User::first())->patch('/employee/' . 1, [
            'first_name' => 'updated test employee',
            'last_name' => 'test employee',
            'email' => 'testemployee@admin.com',
            'phone' => '09268740496',
            'company_id' => 1,
        ]);

        $this->assertEquals('updated test employee', Employee::find(1)->first_name);

    }

    /** @test */
    public function all_input_fields_in_employee_are_required(){

        $response = $this->actingAs(User::first())->post('/employee', [
            'first_name' => 'updated test employee',
            'last_name' => 'test employee',
            'email' => '',
            'phone' => '09268740496',
            'company_id' => 1,
        ]);

        $response->assertSessionHasErrors(['email']);

    }

    /** @test */
    public function an_employee_can_be_deleted_by_admin(){

        $this->withoutExceptionHandling();

        $response = $this->actingAs(User::first())->delete('/employee/' . Employee::all()->last()->id);

        $response->assertStatus(302);

    }

    //  ./vendor/bin/phpunit --filter an_employee_can_be_deleted_by_admin
}
