<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'created_at' => '2020-10-12 23:52:14',
                'updated_at' => '2020-10-12 23:52:14',
            ),
            array (
                'id' => 2,
                'name' => 'Normal User',
                'created_at' => '2020-10-12 23:52:14',
                'updated_at' => '2020-10-12 23:52:14',
            ),
        ));
    }
}
