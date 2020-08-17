<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //   ____           _                                   _
        //  / ___|   __ _  | |_    ___    __ _    ___    _ __  (_)   ___   ___
        // | |      / _` | | __|  / _ \  / _` |  / _ \  | '__| | |  / _ \ / __|
        // | |___  | (_| | | |_  |  __/ | (_| | | (_) | | |    | | |  __/ \__ \
        //  \____|  \__,_|  \__|  \___|  \__, |  \___/  |_|    |_|  \___| |___/
        //                               |___/
        DB::table('product_categories')->insert(['status_id'  => 1]); //product_categories.id => 1
        DB::table('product_category_translations')->insert(
            [
                'product_category_id'   => 1, //incremental
                'language_id'           => 1,
                'name'                  => 'Dessert',
                'description'           => 'Dessert'
            ]
        );

        DB::table('product_categories')->insert(['status_id'  => 1]); //product_categories.id => 2
        DB::table('product_category_translations')->insert(
            [
                'product_category_id'   => 2, //incremental
                'language_id'           => 1,
                'name'                  => 'Pizze',
                'description'           => 'Pizze'
            ]
        );

        DB::table('product_categories')->insert(['status_id'  => 1]); //product_categories.id => 3
        DB::table('product_category_translations')->insert(
            [
                'product_category_id'   => 3, //incremental
                'language_id'           => 1,
                'name'                  => 'Bevande',
                'description'           => 'Bevande'
            ]
        );
        //  ____            _                      _                                   _
        // / ___|   _   _  | |__     ___    __ _  | |_    ___    __ _    ___    _ __  (_)   ___   ___
        // \___ \  | | | | | '_ \   / __|  / _` | | __|  / _ \  / _` |  / _ \  | '__| | |  / _ \ / __|
        //  ___) | | |_| | | |_) | | (__  | (_| | | |_  |  __/ | (_| | | (_) | | |    | | |  __/ \__ \
        // |____/   \__,_| |_.__/   \___|  \__,_|  \__|  \___|  \__, |  \___/  |_|    |_|  \___| |___/
        //                                                      |___/
        DB::table('product_subcategories')->insert(['product_category_id'  => 1]); //product_subcategories.id => 1
        DB::table('product_subcategory_translations')->insert(
            [
                'product_subcategory_id'    => 1, //incremental
                'language_id'               => 1,
                'name'                      => 'Torta',
                'description'               => 'Torta'
            ]
        );

        DB::table('product_subcategories')->insert(['product_category_id'  => 1]); //product_subcategories.id => 2
        DB::table('product_subcategory_translations')->insert(
            [
                'product_subcategory_id'    => 2, //incremental
                'language_id'               => 1,
                'name'                      => 'Gelato',
                'description'               => 'Gelato'
            ]
        );

        DB::table('product_subcategories')->insert(['product_category_id'  => 2]); //product_subcategories.id => 3
        DB::table('product_subcategory_translations')->insert(
            [
                'product_subcategory_id'    => 3, //incremental
                'language_id'               => 1,
                'name'                      => 'Pizze senza formaggio',
                'description'               => 'Pizze senza formaggio'
            ]
        );

        DB::table('product_subcategories')->insert(['product_category_id'  => 2]); //product_subcategories.id => 4
        DB::table('product_subcategory_translations')->insert(
            [
                'product_subcategory_id'    => 4, //incremental
                'language_id'               => 1,
                'name'                      => 'Pizza con formaggio',
                'description'               => 'Pizza con formaggio'
            ]
        );

        DB::table('product_subcategories')->insert(['product_category_id'  => 3]); //product_subcategories.id => 5
        DB::table('product_subcategory_translations')->insert(
            [
                'product_subcategory_id'    => 5, //incremental
                'language_id'               => 1,
                'name'                      => 'Bevande calde',
                'description'               => 'Bevande calde'
            ]
        );

        DB::table('product_subcategories')->insert(['product_category_id'  => 3]); //product_subcategories.id => 6
        DB::table('product_subcategory_translations')->insert(
            [
                'product_subcategory_id'    => 6, //incremental
                'language_id'               => 1,
                'name'                      => 'Bevande fredde',
                'description'               => 'Bevande fredde'
            ]
        );
        //  ____                               _
        // | __ )   _ __    __ _   _ __     __| |  ___
        // |  _ \  | '__|  / _` | | '_ \   / _` | / __|
        // | |_) | | |    | (_| | | | | | | (_| | \__ \
        // |____/  |_|     \__,_| |_| |_|  \__,_| |___/
        //
        DB::table('brands')->insert(['slug'  => 'PEP']); //brands.id => 1
        DB::table('brand_translations')->insert(
            [
                'brand_id'      => 1, //incremental
                'language_id'   => 1,
                'name'          => 'Pepsi',
                'description'   => 'Pepsi this is the description.'
            ]
        );

        DB::table('brands')->insert(['slug'  => 'COC']); //brands.id => 2
        DB::table('brand_translations')->insert(
            [
                'brand_id'      => 2, //incremental
                'language_id'   => 1,
                'name'          => 'Coca-Cola',
                'description'   => 'Coca-Cola this is the description.'
            ]
        );
        //  ____                                       _             _     _
        // |  _ \   _ __    ___   ___    ___   _ __   | |_    __ _  | |_  (_)   ___    _ __    ___
        // | |_) | | '__|  / _ \ / __|  / _ \ | '_ \  | __|  / _` | | __| | |  / _ \  | '_ \  / __|
        // |  __/  | |    |  __/ \__ \ |  __/ | | | | | |_  | (_| | | |_  | | | (_) | | | | | \__ \
        // |_|     |_|     \___| |___/  \___| |_| |_|  \__|  \__,_|  \__| |_|  \___/  |_| |_| |___/
        //
        DB::table('product_presentations')->insert(['status_id'  => 1]); //product_presentations.id => 1
        DB::table('product_presentation_translations')->insert(
            [
                'product_presentation_id'   => 1, //incremental
                'language_id'               => 1,
                'name'                      => 'Normali',
                'description'               => 'Pizze di dimensioni normali'
            ]
        );

        DB::table('product_presentations')->insert(['status_id'  => 1]); //product_presentations.id => 2
        DB::table('product_presentation_translations')->insert(
            [
                'product_presentation_id'   => 2, //incremental
                'language_id'               => 1,
                'name'                      => 'Giganti',
                'description'               => 'Pizze di dimensioni giganti'
            ]
        );
    }
}
