<?php

use Illuminate\Database\Seeder;

class RolesAndPermissionsTableSeeder extends Seeder
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
                'tag'              => 'back_role_title',
                'value'            => 'Ruolo',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_role_name',
                'value'            => 'Nome',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_role_description',
                'value'            => 'Descrizione',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_role_permissionstorole_title',
                'value'            => 'Aggiungi permessi a un ruolo.',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_role_permissionstorole_form_title_role',
                'value'            => 'Seleziona un ruolo.',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_role_permissionstorole_form_title_permissions',
                'value'            => 'Seleziona le autorizzazioni.',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_role_permissionstouser_title',
                'value'            => 'Aggiungi permessi a un utente.',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_role_rolestouser_title',
                'value'            => 'Aggiungere ruolo a un utente.',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_role_searchuser_title',
                'value'            => 'Cerca utente.',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_user_title',
                'value'            => 'Utente',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_users_title',
                'value'            => 'Utenti',
                'front_section_id' => 1,
                'language_id'      => 1
            ]
        ]);
    }
}