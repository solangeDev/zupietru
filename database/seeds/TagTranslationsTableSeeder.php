<?php

use Illuminate\Database\Seeder;

class TagTranslationsTableSeeder extends Seeder
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
                'tag'              => 'back_activity_categories_title',
                'value'            => 'Categorie di Attività',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_create',
                'value'            => 'Creare',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_edit',
                'value'            => 'Modificare',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_show',
                'value'            => 'Mostrare',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_home',
                'value'            => 'Home',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_addnew',
                'value'            => 'Aggiungere nuova',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_continue',
                'value'            => 'Continua',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_save',
                'value'            => 'Salvare',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_cancel',
                'value'            => 'Annulla',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_close',
                'value'            => 'Vicinoicino',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_back',
                'value'            => 'Indietro',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_reset',
                'value'            => 'Reset',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_language',
                'value'            => 'Linguaggio',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_name',
                'value'            => 'Nome',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_description',
                'value'            => 'Descrizione',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_title',
                'value'            => 'Titolo',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_subtitle',
                'value'            => 'Sottotitolo',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_code',
                'value'            => 'Cod',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_select',
                'value'            => 'Seleziona un\'opzione',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_status',
                'value'            => 'Stato',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_index',
                'value'            => 'Listato',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_id',
                'value'            => 'ID',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_action',
                'value'            => 'Azione',
                'front_section_id' => 1,
                'language_id'      => 1
            ],

            [
                'tag'              => 'back_general_tax',
                'value'            => 'Imposta',
                'front_section_id' => 1,
                'language_id'      => 1
            ],

            [
                'tag'              => 'back_general_subtotal',
                'value'            => 'Totale Parziale',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_total',
                'value'            => 'Totale',
                'front_section_id' => 1,
                'language_id'      => 1
            ],

            [
                'tag'              => 'back_general_datein',
                'value'            => 'Data di Inizio',
                'front_section_id' => 1,
                'language_id'      => 1
            ],

            [
                'tag'              => 'back_general_dateout',
                'value'            => 'Data di Fine',
                'front_section_id' => 1,
                'language_id'      => 1
            ],

            [
                'tag'              => 'back_general_ricerca',
                'value'            => 'Ricerca',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_email',
                'value'            => 'e-mail',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_container',
                'value'            => 'Contenitore',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_yes',
                'value'            => 'Sì',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_no',
                'value'            => 'No',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_general_phone',
                'value'            => 'Telefono',
                'front_section_id' => 1,
                'language_id'      => 1
            ],
            [
                'tag'              => 'back_newslettes_title',
                'value'            => 'Utenti Della Newsletter',
                'front_section_id' => 1,
                'language_id'      => 1
            ]
        ]);
    }
}
