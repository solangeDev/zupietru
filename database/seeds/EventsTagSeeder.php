<?php

use Illuminate\Database\Seeder;

class EventsTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     //  _____                          _        ____           _
     // | ____| __   __   ___   _ __   | |_     / ___|   __ _  | |_    ___    __ _    ___    _ __   _   _
     // |  _|   \ \ / /  / _ \ | '_ \  | __|   | |      / _` | | __|  / _ \  / _` |  / _ \  | '__| | | | |
     // | |___   \ V /  |  __/ | | | | | |_    | |___  | (_| | | |_  |  __/ | (_| | | (_) | | |    | |_| |
     // |_____|   \_/    \___| |_| |_|  \__|    \____|  \__,_|  \__|  \___|  \__, |  \___/  |_|     \__, |
     //                                                                      |___/                  |___/

        DB::table('tag_translations')->insert([
            [
                'tag'              => 'back_event_categories_title',
                'value'            => 'Categorie di Eventi',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
        ]);

        DB::table('event_categories')->insert([
            [
                'code'             => 'CU',
                'status_id'        => 1
            ],
            [
                'code'             => 'EP',
                'status_id'        => 1
            ],
        ]);

        DB::table('event_category_translations')->insert([
            [
                'name'              => 'Compleanno',
                'description'       => 'festa di compleanno',
                'event_category_id' => 1, // 1=>backoffice
                'language_id'       => 1 // 1=>italiano, 2=>ingles
            ],

            [
                'name'              => 'Eventi Speciali',
                'description'       => 'Riunioni di Famiglia',
                'event_category_id' => 2, // 1=>backoffice
                'language_id'       => 1 // 1=>italiano, 2=>ingles
            ],
        ]);

     //  _____                          _
     // | ____| __   __   ___   _ __   | |_
     // |  _|   \ \ / /  / _ \ | '_ \  | __|
     // | |___   \ V /  |  __/ | | | | | |_
     // |_____|   \_/    \___| |_| |_|  \__|

            DB::table('tag_translations')->insert([
            [
                'tag'              => 'back_event_title',
                'value'            => 'Eventi',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
        ]);
    }
}
