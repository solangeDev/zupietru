<?php

use Illuminate\Database\Seeder;

class DataBaseTagsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BookingTableSeeder::class,
            ControllerReturnMessagesSeeder::class,
            EventsTagSeeder::class,
            FrontSectionsTableSeeder::class,
            MenuTagSeeder::class,
            OrdersTableSeeder::class,
            RolesAndPermissionsTableSeeder::class,
            SeosTableSeeder::class,
            TagTranslationsTableSeeder::class,
            ProductTagsTableSedeer::class,
            RequestsTagSeeder::class
        ]);
    }
}
