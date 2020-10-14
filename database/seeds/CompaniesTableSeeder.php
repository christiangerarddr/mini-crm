<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Company::class, 11)->create()->each(function ($company) {
            factory(App\Models\Company::class)->create();
        });
    }
}
