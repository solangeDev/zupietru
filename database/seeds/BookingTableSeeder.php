<?php

use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder
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
                'tag'              => 'back_booking_title',
                'value'            => 'prenotazione',
                'front_section_id' => 1,
                'language_id'      => 1
            ]
          ]);
    }
}
