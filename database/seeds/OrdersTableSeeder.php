<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
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
                'tag'              => 'back_orders_title',
                'value'            => 'Ordini',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_orders_user_exists',
                'value'            => 'Utente registrato?',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_orders_user_info',
                'value'            => 'Informazioni utente',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ]
        ]);
    }
}
