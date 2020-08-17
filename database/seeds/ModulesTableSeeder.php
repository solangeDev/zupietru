<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            [
                'code' => 'act',
		        'name' => 'Activities',
		        'status_id' => 1,
            ],
            [
                'code' => 'actcat',
		        'name' => 'activityCategories',
		        'status_id' => 1,
            ],
            [
                'code' => 'actcattran',
		        'name' => 'activityCategoryTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'acttran',
		        'name' => 'activityTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'blo',
		        'name' => 'blogs',
		        'status_id' => 1,
            ],
            [
                'code' => 'blocat',
		        'name' => 'blogCategories',
		        'status_id' => 1,
            ],
            [
                'code' => 'blocattran',
		        'name' => 'blogCategoryTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'blocomm',
		        'name' => 'blogComments',
		        'status_id' => 1,
            ],
            [
                'code' => 'blotra',
		        'name' => 'blogTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'boo',
		        'name' => 'bookings',
		        'status_id' => 1,
            ],
            [
                'code' => 'boodeta',
		        'name' => 'bookingDetails',
		        'status_id' => 1,
            ],
            [
                'code' => 'bra',
		        'name' => 'brands',
		        'status_id' => 1,
            ],
            [
                'code' => 'bratra',
		        'name' => 'brandTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'eve',
		        'name' => 'events',
		        'status_id' => 1,
            ],
            [
                'code' => 'evecat',
		        'name' => 'eventCategories',
		        'status_id' => 1,
            ],
            [
                'code' => 'evecattran',
		        'name' => 'eventCategoryTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'evetra',
		        'name' => 'eventTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'frosec',
		        'name' => 'frontSections',
		        'status_id' => 1,
            ],
            [
                'code' => 'lan',
		        'name' => 'languages',
		        'status_id' => 1,
            ],
            [
                'code' => 'mod',
		        'name' => 'modules',
		        'status_id' => 1,
            ],
            [
                'code' => 'mul',
		        'name' => 'multimedias',
		        'status_id' => 1,
            ],
            [
                'code' => 'new',
		        'name' => 'newsletterUsers',
		        'status_id' => 1,
            ],
            [
                'code' => 'ord',
		        'name' => 'orders',
		        'status_id' => 1,
            ],
            [
                'code' => 'orddet',
		        'name' => 'orderDetails',
		        'status_id' => 1,
            ],
            [
                'code' => 'paymet',
		        'name' => 'paymentMethods',
		        'status_id' => 1,
            ],
            [
                'code' => 'per',
		        'name' => 'permissions',
		        'status_id' => 1,
            ],
            [
                'code' => 'perrol',
		        'name' => 'permissionRole',
		        'status_id' => 1,
            ],
            [
                'code' => 'peruser',
		        'name' => 'permissionUser',
		        'status_id' => 1,
            ],
            [
                'code' => 'pro',
		        'name' => 'products',
		        'status_id' => 1,
            ],
            [
                'code' => 'procat',
		        'name' => 'productCategories',
		        'status_id' => 1,
            ],
            [
                'code' => 'procattra',
		        'name' => 'productCategoryTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'propre',
		        'name' => 'productPresentations',
		        'status_id' => 1,
            ],
            [
                'code' => 'proprepro',
		        'name' => 'productPresentationsProducts',
		        'status_id' => 1,
            ],
            [
                'code' => 'propretra',
		        'name' => 'productPresentationTranslation',
		        'status_id' => 1,
            ],
            [
                'code' => 'prosub',
		        'name' => 'productSubcategories',
		        'status_id' => 1,
            ],
            [
                'code' => 'prosubtra',
		        'name' => 'productSubcategoryTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'protra',
		        'name' => 'productTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'rol',
		        'name' => 'roles',
		        'status_id' => 1,
            ],
            [
                'code' => 'roluser',
		        'name' => 'roleUser',
		        'status_id' => 1,
            ],
            [
                'code' => 'roo',
		        'name' => 'rooms',
		        'status_id' => 1,
            ],
            [
                'code' => 'rooser',
		        'name' => 'roomsServices',
		        'status_id' => 1,
            ],
            [
                'code' => 'roocat',
		        'name' => 'roomCategories',
		        'status_id' => 1,
            ],
            [
                'code' => 'roocattra',
		        'name' => 'roomCategoryTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'roosea',
		        'name' => 'roomSeasons',
		        'status_id' => 1,
            ],
            [
                'code' => 'rooseatra',
		        'name' => 'roomSeasonTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'rootra',
		        'name' => 'roomTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'row',
		        'name' => 'rows',
		        'status_id' => 1,
            ],
            [
                'code' => 'rowmul',
		        'name' => 'rowsMultimedias',
		        'status_id' => 1,
            ],
            [
                'code' => 'seo',
		        'name' => 'seos',
		        'status_id' => 1,
            ],
            [
                'code' => 'seotra',
		        'name' => 'seoTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'ser',
		        'name' => 'services',
		        'status_id' => 1,
            ],
            [
                'code' => 'sercat',
		        'name' => 'serviceCategories',
		        'status_id' => 1,
            ],
            [
                'code' => 'sercattra',
		        'name' => 'serviceCategoryTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'sertra',
		        'name' => 'serviceTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'sta',
		        'name' => 'statuses',
		        'status_id' => 1,
            ],
            [
                'code' => 'tagtra',
		        'name' => 'tagTranslations',
		        'status_id' => 1,
            ],
            [
                'code' => 'use',
		        'name' => 'users',
		        'status_id' => 1,
            ],
            [
                'code' => 'useadre',
		        'name' => 'userAddresses',
		        'status_id' => 1,
            ]
        ]);
    }
}
