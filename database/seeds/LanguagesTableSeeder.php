<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                'code'           => 'it',
                'name'           => 'Italiano',
                'status_id'      => 1
            ],
            [
                'code'           => 'en',
                'name'           => 'English',
                'status_id'      => 1
            ]
        ]);
    }
}
