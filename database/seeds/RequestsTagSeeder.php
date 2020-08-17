<?php

use Illuminate\Database\Seeder;

class RequestsTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tag_translations')->insert([
            [
                'tag'              => 'back_requests_title',
                'value'            => 'Richiesta',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
        ]);
    }
}
