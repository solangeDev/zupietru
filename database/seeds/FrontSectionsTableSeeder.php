<?php

use Illuminate\Database\Seeder;

class FrontSectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('front_sections')->insert([
            [
                'code' => 'BACK',
                'name' => 'Back Office'
            ]
        ]);
    }
}
