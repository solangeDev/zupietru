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
        DB::table('roles')->insert([
            [
                'name' => 'ADMIN',
		        'slug' => 'admin',
		        'description' => 'System administrator.',
            ],
            [
                'name' => 'ANALYST',
		        'slug' => 'analyst',
		        'description' => 'Analyst',
            ],
            [
                'name' => 'CLIENT',
		        'slug' => 'client',
		        'description' => 'Client',
            ]
        ]);
    }
}
