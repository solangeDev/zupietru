<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'name'         => 'Forgot Password',
		        'slug'         => 'user-forgot-password',
		        'description'  => 'Forgot Password',
                'module_id'    => 57
            ],
            [
                'name'         => 'Login',
                'slug'         => 'user-login',
                'description'  => 'Login',
                'module_id'    => 57
            ],
            [
                'name'         => 'Register',
                'slug'         => 'user-register',
                'description'  => 'Register',
                'module_id'    => 57
            ],
            [
                'name'         => 'Resets Password',
                'slug'         => 'user-resets-password',
                'description'  => 'Resets Password',
                'module_id'    => 57
            ]
        ]);
    }
}
