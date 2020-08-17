<?php

use Illuminate\Database\Seeder;

class ControllerReturnMessagesSeeder extends Seeder
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
                'tag'              => 'back_message_has_permission',
                'value'            => 'Ha già il permesso.',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_message_not_have_permission',
                'value'            => 'Non hai permessi.',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_message_success',
                'value'            => 'Il record è stato salvato con successo.',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ]
        ]);
    }
}
