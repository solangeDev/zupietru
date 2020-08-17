<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StatusesTableSeeder::class,
            LanguagesTableSeeder::class,
            StatusTranslationsTableSeeder::class,
            FrontSectionsTableSeeder::class,

            TagTranslationsTableSeeder::class,
            ProductsTableSeeder::class,
            OrdersTableSeeder::class,
            RolesAndPermissionsTableSeeder::class,

            ModulesTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,

            EventsTagSeeder::class,                     /* Update: 06-08-208 / 11:45 */
            ControllerReturnMessagesSeeder::class,      /* Update: 06-08-208 / 11:45 */
            MenuTagSeeder::class,                       /* Update: 06-08-208 / 11:45 */
            SeosTableSeeder::class,                     /* Update: 06-08-208 / 14:00 */

            BookingTableSeeder::class,
            ProductTagsTableSedeer::class,
            RequestsTagSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class
        ]);
    }
}
