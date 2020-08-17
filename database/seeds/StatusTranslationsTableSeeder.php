<?php

use Illuminate\Database\Seeder;

class StatusTranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_translations')->insert([
            [
                'name'          => 'Attivo',
                'description'   => 'Elemento attivo',
                'status_id'     => 1,
                'language_id'   => 1
            ],
            [
                'name'          => 'Inattivo',
                'description'   => 'Elemento inattivo',
                'status_id'     => 2,
                'language_id'   => 1
            ]
        ]);
    }
}
