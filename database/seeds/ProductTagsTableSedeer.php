<?php

use Illuminate\Database\Seeder;

class ProductTagsTableSedeer extends Seeder
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
                'tag'              => 'back_product_presentations_title',
                'value'            => 'Presentazione del Prodotto',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_brand_title',
                'value'            => 'Marca di Prodotto',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1  // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_product_subcategories_title',
                'value'            => 'Sottocategoria di Prodotto',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_product_categories_title',
                'value'            => 'Categoria di Prodotto',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_product_additionals_title',
                'value'            => 'Addizionale',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_products_title',
                'value'            => 'Prodotti',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_order_address',
                'value'            => 'Indirizzo dell\'utente',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_order_product_items',
                'value'            => 'Articoli di prodotti',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ],
            [
                'tag'              => 'back_order_price_summary',
                'value'            => 'Sommario dei prezzi',
                'front_section_id' => 1, // 1=>backoffice
                'language_id'      => 1 // 1=>italiano, 2=>ingles
            ]
        ]);
    }
}




