<?php

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Pizzeria Da Adriano',
                'email' => 'info@pizeriadaadriano.com',
		        'password' => Hash::make('123456'),
		        'remember_token' => str_random(10),
            ],
            [
                'name' => 'Steven Sucre',
                'email' => 'steven.sucre@jumperr.com',
                'password' => Hash::make('123456'),
                'remember_token' => str_random(10),
            ],
            [
                'name' => 'Erick Perez',
                'email' => 'erick.perez@jumperr.com',
                'password' => Hash::make('123456'),
                'remember_token' => str_random(10),
            ],
            [
                'name' => 'Euglis Lopez',
                'email' => 'euglis.lopez@jumperr.com',
                'password' => Hash::make('123456'),
                'remember_token' => str_random(10),
            ],
            [
                'name' => 'Francisco Hernandez',
                'email' => 'fransico.hernandez@jumperr.com',
                'password' => Hash::make('123456'),
                'remember_token' => str_random(10),
            ]
        ]);
    }
}