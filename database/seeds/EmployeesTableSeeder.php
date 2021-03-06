<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Employee::class, 11)->create()->each(function ($employee) {
            factory(App\Models\Employee::class)->create();
        });
    }
}
