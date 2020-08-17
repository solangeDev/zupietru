<?php

use Illuminate\Database\Seeder;

class MenuTagSeeder extends Seeder
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
                'tag'              => 'back_menu_users_title',
                'value'            => 'Admin. di utente',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_menu_users_permission_to_role',
                'value'            => 'Autorizzazioni per un ruolo',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_menu_users_permission_to_user',
                'value'            => 'Autorizzazioni per un utente',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_menu_users_roles_to_user',
                'value'            => 'Ruoli per un utente',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ]
        ]);
    }
}
