<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$aTL3TepFfbKCcgFwJcdFK.PGe8Bon9yegX3rJ8gBuWkJVPFwPS9D2',
                'remember_token' => NULL,
                'created_at' => '2020-10-12 23:52:14',
                'updated_at' => '2020-10-12 23:52:14',
            ),
        ));
        
        
    }
}