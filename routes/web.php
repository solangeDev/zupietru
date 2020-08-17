<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home.index');
});


//Auth::routes();
// Authentication routes...
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');

// Auth::routes();


Route::get('/error400', function () {
    return view('pages.errors.error400');
});

Route::get('/error500', function () {
    return view('pages.errors.error500');
});

Route::get('/token',function(){
    echo csrf_token();
});

// route for processing payment
Route::post('/paypal', 'PaypalController@payWithpaypal');
Route::get('status', 'PaymentController@getPaymentStatus');
Route::get('getSession', 'PaymentController@getSession');


Route::middleware(['auth',])->group(function () {

	Route::get('/home', 'HomeController@index')->name('home');


	/* Mostrar la vista para agregar permisos a un rol / show the view for add permissions to a role */
	Route::get('permissionstorole', 'Admin\RoleController@viewPermissionsToRole')->name('admin.permissionstorole');
	/* Agregar permisos a un rol / Add permissions to a role */
	Route::post('permissionstorole', 'Admin\RoleController@permissionsToRole')->name('admin.permissionstorole');
	/* Mostrar la vista para agregar permisos a un usuario / show the view for add permissions to a user */
	Route::get('permissionstouser', 'Admin\RoleController@viewPermissionsToUser')->name('admin.permissionstouser');
	/* Agregar permisos a un usuario / Add permissions to a user */
	Route::post('permissionstouser', 'Admin\RoleController@permissionsToUser')->name('admin.permissionstouser');
	/* Mostrar la vista para agregar role a un usuario / show the view for add roles to a user */
	Route::get('rolestouser', 'Admin\RoleController@viewRolestouser')->name('admin.rolestouser');
	/* Agregar roles a un usuario / Add roles to a user */
	Route::post('rolestouser', 'Admin\RoleController@rolesToUser')->name('admin.rolestouser');
	/* Buscar a un usuario / Search to a user */
	Route::post('searchuser', 'Admin\RoleController@searchUser')->name('admin.search.user');
	/* Buscar los permisos de un rol / Look up the permissions of a role */
	Route::get('lookuppermissionsofrole/{role}', 'Admin\RoleController@lookUpPermissionsOfRole')->name('admin.look.up.permissions.of.role');
	/* Eliminar un seo / Delete a seo */
	Route::post('delete/seo', 'Admin\UtilController@deleteSeo')->name('admin.delete.seo');


	Route::get('admin/activityCategoryTranslations', ['as'=> 'admin.activityCategoryTranslations.index', 'uses' => 'Admin\ActivityCategoryTranslationController@index']);
	Route::post('admin/activityCategoryTranslations', ['as'=> 'admin.activityCategoryTranslations.store', 'uses' => 'Admin\ActivityCategoryTranslationController@store']);
	Route::get('admin/activityCategoryTranslations/create', ['as'=> 'admin.activityCategoryTranslations.create', 'uses' => 'Admin\ActivityCategoryTranslationController@create']);
	Route::put('admin/activityCategoryTranslations/{activityCategoryTranslations}', ['as'=> 'admin.activityCategoryTranslations.update', 'uses' => 'Admin\ActivityCategoryTranslationController@update']);
	Route::patch('admin/activityCategoryTranslations/{activityCategoryTranslations}', ['as'=> 'admin.activityCategoryTranslations.update', 'uses' => 'Admin\ActivityCategoryTranslationController@update']);
	Route::delete('admin/activityCategoryTranslations/{activityCategoryTranslations}', ['as'=> 'admin.activityCategoryTranslations.destroy', 'uses' => 'Admin\ActivityCategoryTranslationController@destroy']);
	Route::get('admin/activityCategoryTranslations/{activityCategoryTranslations}', ['as'=> 'admin.activityCategoryTranslations.show', 'uses' => 'Admin\ActivityCategoryTranslationController@show']);
	Route::get('admin/activityCategoryTranslations/{activityCategoryTranslations}/edit', ['as'=> 'admin.activityCategoryTranslations.edit', 'uses' => 'Admin\ActivityCategoryTranslationController@edit']);


	Route::get('admin/activityTranslations', ['as'=> 'admin.activityTranslations.index', 'uses' => 'Admin\ActivityTranslationController@index']);
	Route::post('admin/activityTranslations', ['as'=> 'admin.activityTranslations.store', 'uses' => 'Admin\ActivityTranslationController@store']);
	Route::get('admin/activityTranslations/create', ['as'=> 'admin.activityTranslations.create', 'uses' => 'Admin\ActivityTranslationController@create']);
	Route::put('admin/activityTranslations/{activityTranslations}', ['as'=> 'admin.activityTranslations.update', 'uses' => 'Admin\ActivityTranslationController@update']);
	Route::patch('admin/activityTranslations/{activityTranslations}', ['as'=> 'admin.activityTranslations.update', 'uses' => 'Admin\ActivityTranslationController@update']);
	Route::delete('admin/activityTranslations/{activityTranslations}', ['as'=> 'admin.activityTranslations.destroy', 'uses' => 'Admin\ActivityTranslationController@destroy']);
	Route::get('admin/activityTranslations/{activityTranslations}', ['as'=> 'admin.activityTranslations.show', 'uses' => 'Admin\ActivityTranslationController@show']);
	Route::get('admin/activityTranslations/{activityTranslations}/edit', ['as'=> 'admin.activityTranslations.edit', 'uses' => 'Admin\ActivityTranslationController@edit']);


	// Route::get('admin/blogCategoryTranslations', ['as'=> 'admin.blogCategoryTranslations.index', 'uses' => 'Admin\BlogCategoryTranslationController@index']);
	// Route::post('admin/blogCategoryTranslations', ['as'=> 'admin.blogCategoryTranslations.store', 'uses' => 'Admin\BlogCategoryTranslationController@store']);
	// Route::get('admin/blogCategoryTranslations/create', ['as'=> 'admin.blogCategoryTranslations.create', 'uses' => 'Admin\BlogCategoryTranslationController@create']);
	// Route::put('admin/blogCategoryTranslations/{blogCategoryTranslations}', ['as'=> 'admin.blogCategoryTranslations.update', 'uses' => 'Admin\BlogCategoryTranslationController@update']);
	// Route::patch('admin/blogCategoryTranslations/{blogCategoryTranslations}', ['as'=> 'admin.blogCategoryTranslations.update', 'uses' => 'Admin\BlogCategoryTranslationController@update']);
	// Route::delete('admin/blogCategoryTranslations/{blogCategoryTranslations}', ['as'=> 'admin.blogCategoryTranslations.destroy', 'uses' => 'Admin\BlogCategoryTranslationController@destroy']);
	// Route::get('admin/blogCategoryTranslations/{blogCategoryTranslations}', ['as'=> 'admin.blogCategoryTranslations.show', 'uses' => 'Admin\BlogCategoryTranslationController@show']);
	// Route::get('admin/blogCategoryTranslations/{blogCategoryTranslations}/edit', ['as'=> 'admin.blogCategoryTranslations.edit', 'uses' => 'Admin\BlogCategoryTranslationController@edit']);


	// Route::get('admin/blogTranslations', ['as'=> 'admin.blogTranslations.index', 'uses' => 'Admin\BlogTranslationController@index']);
	// Route::post('admin/blogTranslations', ['as'=> 'admin.blogTranslations.store', 'uses' => 'Admin\BlogTranslationController@store']);
	// Route::get('admin/blogTranslations/create', ['as'=> 'admin.blogTranslations.create', 'uses' => 'Admin\BlogTranslationController@create']);
	// Route::put('admin/blogTranslations/{blogTranslations}', ['as'=> 'admin.blogTranslations.update', 'uses' => 'Admin\BlogTranslationController@update']);
	// Route::patch('admin/blogTranslations/{blogTranslations}', ['as'=> 'admin.blogTranslations.update', 'uses' => 'Admin\BlogTranslationController@update']);
	// Route::delete('admin/blogTranslations/{blogTranslations}', ['as'=> 'admin.blogTranslations.destroy', 'uses' => 'Admin\BlogTranslationController@destroy']);
	// Route::get('admin/blogTranslations/{blogTranslations}', ['as'=> 'admin.blogTranslations.show', 'uses' => 'Admin\BlogTranslationController@show']);
	// Route::get('admin/blogTranslations/{blogTranslations}/edit', ['as'=> 'admin.blogTranslations.edit', 'uses' => 'Admin\BlogTranslationController@edit']);


	Route::get('admin/productCategories', ['as'=> 'admin.productCategories.index', 'uses' => 'Admin\ProductCategoryTranslationController@index']);
	Route::post('admin/productCategories', ['as'=> 'admin.productCategories.store', 'uses' => 'Admin\ProductCategoryTranslationController@store']);
	Route::get('admin/productCategories/create', ['as'=> 'admin.productCategories.create', 'uses' => 'Admin\ProductCategoryTranslationController@create']);
	Route::put('admin/productCategories/{productCategories}', ['as'=> 'admin.productCategories.update', 'uses' => 'Admin\ProductCategoryTranslationController@update']);
	Route::patch('admin/productCategories/{productCategories}', ['as'=> 'admin.productCategories.update', 'uses' => 'Admin\ProductCategoryTranslationController@update']);
	Route::delete('admin/productCategories/{productCategories}', ['as'=> 'admin.productCategories.destroy', 'uses' => 'Admin\ProductCategoryTranslationController@destroy']);
	Route::get('admin/productCategories/{productCategories}', ['as'=> 'admin.productCategories.show', 'uses' => 'Admin\ProductCategoryTranslationController@show']);
	Route::get('admin/productCategories/{productCategories}/edit', ['as'=> 'admin.productCategories.edit', 'uses' => 'Admin\ProductCategoryTranslationController@edit']);


    Route::get('admin/productAdditionals', ['as'=> 'admin.productAdditionals.index', 'uses' => 'Admin\ProductAdditionalTranslationController@index']);
    Route::post('admin/productAdditionals', ['as'=> 'admin.productAdditionals.store', 'uses' => 'Admin\ProductAdditionalTranslationController@store']);
    Route::get('admin/productAdditionals/create', ['as'=> 'admin.productAdditionals.create', 'uses' => 'Admin\ProductAdditionalTranslationController@create']);
    Route::put('admin/productAdditionals/{productAdditionals}', ['as'=> 'admin.productAdditionals.update', 'uses' => 'Admin\ProductAdditionalTranslationController@update']);
    Route::patch('admin/productAdditionals/{productAdditionals}', ['as'=> 'admin.productAdditionals.update', 'uses' => 'Admin\ProductAdditionalTranslationController@update']);
    Route::delete('admin/productAdditionals/{productAdditionals}', ['as'=> 'admin.productAdditionals.destroy', 'uses' => 'Admin\ProductAdditionalTranslationController@destroy']);
    Route::get('admin/productAdditionals/{productAdditionals}', ['as'=> 'admin.productAdditionals.show', 'uses' => 'Admin\ProductAdditionalTranslationController@show']);
    Route::get('admin/productAdditionals/{productAdditionals}/edit', ['as'=> 'admin.productAdditionals.edit', 'uses' => 'Admin\ProductAdditionalTranslationController@edit']);


	Route::get('admin/productSubcategories', ['as'=> 'admin.productSubcategories.index', 'uses' => 'Admin\ProductSubcategoryTranslationController@index']);
	Route::post('admin/productSubcategories', ['as'=> 'admin.productSubcategories.store', 'uses' => 'Admin\ProductSubcategoryTranslationController@store']);
	Route::get('admin/productSubcategories/create', ['as'=> 'admin.productSubcategories.create', 'uses' => 'Admin\ProductSubcategoryTranslationController@create']);
	Route::put('admin/productSubcategories/{productSubcategories}', ['as'=> 'admin.productSubcategories.update', 'uses' => 'Admin\ProductSubcategoryTranslationController@update']);
	Route::patch('admin/productSubcategories/{productSubcategories}', ['as'=> 'admin.productSubcategories.update', 'uses' => 'Admin\ProductSubcategoryTranslationController@update']);
	Route::delete('admin/productSubcategories/{productSubcategories}', ['as'=> 'admin.productSubcategories.destroy', 'uses' => 'Admin\ProductSubcategoryTranslationController@destroy']);
	Route::get('admin/productSubcategories/{productSubcategories}', ['as'=> 'admin.productSubcategories.show', 'uses' => 'Admin\ProductSubcategoryTranslationController@show']);
	Route::get('admin/productSubcategories/{productSubcategories}/edit', ['as'=> 'admin.productSubcategories.edit', 'uses' => 'Admin\ProductSubcategoryTranslationController@edit']);


	Route::get('admin/brands', ['as'=> 'admin.brands.index', 'uses' => 'Admin\BrandTranslationController@index']);
	Route::post('admin/brands', ['as'=> 'admin.brands.store', 'uses' => 'Admin\BrandTranslationController@store']);
	Route::get('admin/brands/create', ['as'=> 'admin.brands.create', 'uses' => 'Admin\BrandTranslationController@create']);
	Route::put('admin/brands/{brands}', ['as'=> 'admin.brands.update', 'uses' => 'Admin\BrandTranslationController@update']);
	Route::patch('admin/brands/{brands}', ['as'=> 'admin.brands.update', 'uses' => 'Admin\BrandTranslationController@update']);
	Route::delete('admin/brands/{brands}', ['as'=> 'admin.brands.destroy', 'uses' => 'Admin\BrandTranslationController@destroy']);
	Route::get('admin/brands/{brands}', ['as'=> 'admin.brands.show', 'uses' => 'Admin\BrandTranslationController@show']);
	Route::get('admin/brands/{brands}/edit', ['as'=> 'admin.brands.edit', 'uses' => 'Admin\BrandTranslationController@edit']);


	Route::get('admin/products', ['as'=> 'admin.products.index', 'uses' => 'Admin\ProductTranslationController@index']);
	Route::post('admin/products', ['as'=> 'admin.products.store', 'uses' => 'Admin\ProductTranslationController@store']);
	Route::get('admin/products/create', ['as'=> 'admin.products.create', 'uses' => 'Admin\ProductTranslationController@create']);
	Route::put('admin/products/{products}', ['as'=> 'admin.products.update', 'uses' => 'Admin\ProductTranslationController@update']);
	Route::patch('admin/products/{products}', ['as'=> 'admin.products.update', 'uses' => 'Admin\ProductTranslationController@update']);
	Route::delete('admin/products/{products}', ['as'=> 'admin.products.destroy', 'uses' => 'Admin\ProductTranslationController@destroy']);
	Route::get('admin/products/{products}', ['as'=> 'admin.products.show', 'uses' => 'Admin\ProductTranslationController@show']);
	Route::get('admin/products/{products}/edit', ['as'=> 'admin.products.edit', 'uses' => 'Admin\ProductTranslationController@edit']);
	Route::get('admin/products/subcategory_por_category/{category}', ['as'   => 'subcategory_por_category','uses' => 'Admin\ProductTranslationController@getSubcategoryByCategory']);


	Route::get('admin/productPresentations', ['as'=> 'admin.productPresentations.index', 'uses' => 'Admin\ProductPresentationTranslationController@index']);
	Route::post('admin/productPresentations', ['as'=> 'admin.productPresentations.store', 'uses' => 'Admin\ProductPresentationTranslationController@store']);
	Route::get('admin/productPresentations/create', ['as'=> 'admin.productPresentations.create', 'uses' => 'Admin\ProductPresentationTranslationController@create']);
	Route::put('admin/productPresentations/{productPresentations}', ['as'=> 'admin.productPresentations.update', 'uses' => 'Admin\ProductPresentationTranslationController@update']);
	Route::patch('admin/productPresentations/{productPresentations}', ['as'=> 'admin.productPresentations.update', 'uses' => 'Admin\ProductPresentationTranslationController@update']);
	Route::delete('admin/productPresentations/{productPresentations}', ['as'=> 'admin.productPresentations.destroy', 'uses' => 'Admin\ProductPresentationTranslationController@destroy']);
	Route::get('admin/productPresentations/{productPresentations}', ['as'=> 'admin.productPresentations.show', 'uses' => 'Admin\ProductPresentationTranslationController@show']);
	Route::get('admin/productPresentations/{productPresentations}/edit', ['as'=> 'admin.productPresentations.edit', 'uses' => 'Admin\ProductPresentationTranslationController@edit']);


 //  Route::get('admin/productPresentationProducts', ['as'=> 'admin.productPresentationProducts.index', 'uses' => 'Admin\ProductPresentationProductController@index']);
 //  Route::post('admin/productPresentationProducts', ['as'=> 'admin.productPresentationProducts.store', 'uses' => 'Admin\ProductPresentationProductController@store']);
 //  Route::get('admin/products/{product}/productPresentationProducts/create', ['as'=> 'admin.productPresentationProducts.create', 'uses' => 'Admin\ProductPresentationProductController@create']);
 //  Route::get('admin/products/{product}/productPresentationProducts/{productPresentationProducts}/edit', ['as'=> 'admin.productPresentationProducts.edit', 'uses' => 'Admin\ProductPresentationProductController@edit']);
 //  Route::put('admin/productPresentationProducts/{productPresentationProducts}', ['as'=> 'admin.productPresentationProducts.update', 'uses' => 'Admin\ProductPresentationProductController@update']);
 //  Route::patch('admin/productPresentationProducts/{productPresentationProducts}', ['as'=> 'admin.productPresentationProducts.update', 'uses' => 'Admin\ProductPresentationProductController@update']);
 //  Route::get('admin/productPresentationProducts/destroy/{productPresentationProducts}', ['as'=> 'admin.productPresentationProducts.destroy', 'uses' => 'Admin\ProductPresentationProductController@destroy']);
 //  Route::get('admin/productPresentationProducts/{productPresentationProducts}', ['as'=> 'admin.productPresentationProducts.show', 'uses' => 'Admin\ProductPresentationProductController@show']);




	Route::get('admin/orders', ['as'=> 'admin.orders.index', 'uses' => 'Admin\OrderController@index']);
	Route::post('admin/orders', ['as'=> 'admin.orders.store', 'uses' => 'Admin\OrderController@store']);
	Route::get('admin/orders/create', ['as'=> 'admin.orders.create', 'uses' => 'Admin\OrderController@create']);
	Route::put('admin/orders/{orders}', ['as'=> 'admin.orders.update', 'uses' => 'Admin\OrderController@update']);
	Route::patch('admin/orders/{orders}', ['as'=> 'admin.orders.update', 'uses' => 'Admin\OrderController@update']);
	Route::delete('admin/orders/{orders}', ['as'=> 'admin.orders.destroy', 'uses' => 'Admin\OrderController@destroy']);
	Route::get('admin/orders/{orders}', ['as'=> 'admin.orders.show', 'uses' => 'Admin\OrderController@show']);
	Route::get('admin/orders/{orders}/edit', ['as'=> 'admin.orders.edit', 'uses' => 'Admin\OrderController@edit']);
    Route::get('admin/orders/user_address_by_user/{user}', ['as'   => 'user_address_by_user','uses' => 'Admin\OrderController@getUserAddressByUser']);


	Route::get('admin/orderDetails', ['as'=> 'admin.orderDetails.index', 'uses' => 'Admin\OrderDetailController@index']);
	Route::post('admin/orderDetails', ['as'=> 'admin.orderDetails.store', 'uses' => 'Admin\OrderDetailController@store']);
	Route::get('admin/orderDetails/create', ['as'=> 'admin.orderDetails.create', 'uses' => 'Admin\OrderDetailController@create']);
	Route::put('admin/orderDetails/{orderDetails}', ['as'=> 'admin.orderDetails.update', 'uses' => 'Admin\OrderDetailController@update']);
	Route::patch('admin/orderDetails/{orderDetails}', ['as'=> 'admin.orderDetails.update', 'uses' => 'Admin\OrderDetailController@update']);
	Route::delete('admin/orderDetails/{orderDetails}', ['as'=> 'admin.orderDetails.destroy', 'uses' => 'Admin\OrderDetailController@destroy']);
	Route::get('admin/orderDetails/{orderDetails}', ['as'=> 'admin.orderDetails.show', 'uses' => 'Admin\OrderDetailController@show']);
	Route::get('admin/orderDetails/{orderDetails}/edit', ['as'=> 'admin.orderDetails.edit', 'uses' => 'Admin\OrderDetailController@edit']);


	// Route::get('admin/roomCategoryTranslations', ['as'=> 'admin.roomCategoryTranslations.index', 'uses' => 'Admin\RoomCategoryTranslationController@index']);
	// Route::post('admin/roomCategoryTranslations', ['as'=> 'admin.roomCategoryTranslations.store', 'uses' => 'Admin\RoomCategoryTranslationController@store']);
	// Route::get('admin/roomCategoryTranslations/create', ['as'=> 'admin.roomCategoryTranslations.create', 'uses' => 'Admin\RoomCategoryTranslationController@create']);
	// Route::put('admin/roomCategoryTranslations/{roomCategoryTranslations}', ['as'=> 'admin.roomCategoryTranslations.update', 'uses' => 'Admin\RoomCategoryTranslationController@update']);
	// Route::patch('admin/roomCategoryTranslations/{roomCategoryTranslations}', ['as'=> 'admin.roomCategoryTranslations.update', 'uses' => 'Admin\RoomCategoryTranslationController@update']);
	// Route::delete('admin/roomCategoryTranslations/{roomCategoryTranslations}', ['as'=> 'admin.roomCategoryTranslations.destroy', 'uses' => 'Admin\RoomCategoryTranslationController@destroy']);
	// Route::get('admin/roomCategoryTranslations/{roomCategoryTranslations}', ['as'=> 'admin.roomCategoryTranslations.show', 'uses' => 'Admin\RoomCategoryTranslationController@show']);
	// Route::get('admin/roomCategoryTranslations/{roomCategoryTranslations}/edit', ['as'=> 'admin.roomCategoryTranslations.edit', 'uses' => 'Admin\RoomCategoryTranslationController@edit']);


	// Route::get('admin/roomTranslations', ['as'=> 'admin.roomTranslations.index', 'uses' => 'Admin\RoomTranslationController@index']);
	// Route::post('admin/roomTranslations', ['as'=> 'admin.roomTranslations.store', 'uses' => 'Admin\RoomTranslationController@store']);
	// Route::get('admin/roomTranslations/create', ['as'=> 'admin.roomTranslations.create', 'uses' => 'Admin\RoomTranslationController@create']);
	// Route::put('admin/roomTranslations/{roomTranslations}', ['as'=> 'admin.roomTranslations.update', 'uses' => 'Admin\RoomTranslationController@update']);
	// Route::patch('admin/roomTranslations/{roomTranslations}', ['as'=> 'admin.roomTranslations.update', 'uses' => 'Admin\RoomTranslationController@update']);
	// Route::delete('admin/roomTranslations/{roomTranslations}', ['as'=> 'admin.roomTranslations.destroy', 'uses' => 'Admin\RoomTranslationController@destroy']);
	// Route::get('admin/roomTranslations/{roomTranslations}', ['as'=> 'admin.roomTranslations.show', 'uses' => 'Admin\RoomTranslationController@show']);
	// Route::get('admin/roomTranslations/{roomTranslations}/edit', ['as'=> 'admin.roomTranslations.edit', 'uses' => 'Admin\RoomTranslationController@edit']);


	// Route::get('admin/roomSeasonTranslations', ['as'=> 'admin.roomSeasonTranslations.index', 'uses' => 'Admin\RoomSeasonTranslationController@index']);
	// Route::post('admin/roomSeasonTranslations', ['as'=> 'admin.roomSeasonTranslations.store', 'uses' => 'Admin\RoomSeasonTranslationController@store']);
	// Route::get('admin/roomSeasonTranslations/create', ['as'=> 'admin.roomSeasonTranslations.create', 'uses' => 'Admin\RoomSeasonTranslationController@create']);
	// Route::put('admin/roomSeasonTranslations/{roomSeasonTranslations}', ['as'=> 'admin.roomSeasonTranslations.update', 'uses' => 'Admin\RoomSeasonTranslationController@update']);
	// Route::patch('admin/roomSeasonTranslations/{roomSeasonTranslations}', ['as'=> 'admin.roomSeasonTranslations.update', 'uses' => 'Admin\RoomSeasonTranslationController@update']);
	// Route::delete('admin/roomSeasonTranslations/{roomSeasonTranslations}', ['as'=> 'admin.roomSeasonTranslations.destroy', 'uses' => 'Admin\RoomSeasonTranslationController@destroy']);
	// Route::get('admin/roomSeasonTranslations/{roomSeasonTranslations}', ['as'=> 'admin.roomSeasonTranslations.show', 'uses' => 'Admin\RoomSeasonTranslationController@show']);
	// Route::get('admin/roomSeasonTranslations/{roomSeasonTranslations}/edit', ['as'=> 'admin.roomSeasonTranslations.edit', 'uses' => 'Admin\RoomSeasonTranslationController@edit']);


	Route::get('admin/serviceCategoryTranslations', ['as'=> 'admin.serviceCategoryTranslations.index', 'uses' => 'Admin\ServiceCategoryTranslationController@index']);
	Route::post('admin/serviceCategoryTranslations', ['as'=> 'admin.serviceCategoryTranslations.store', 'uses' => 'Admin\ServiceCategoryTranslationController@store']);
	Route::get('admin/serviceCategoryTranslations/create', ['as'=> 'admin.serviceCategoryTranslations.create', 'uses' => 'Admin\ServiceCategoryTranslationController@create']);
	Route::put('admin/serviceCategoryTranslations/{serviceCategoryTranslations}', ['as'=> 'admin.serviceCategoryTranslations.update', 'uses' => 'Admin\ServiceCategoryTranslationController@update']);
	Route::patch('admin/serviceCategoryTranslations/{serviceCategoryTranslations}', ['as'=> 'admin.serviceCategoryTranslations.update', 'uses' => 'Admin\ServiceCategoryTranslationController@update']);
	Route::delete('admin/serviceCategoryTranslations/{serviceCategoryTranslations}', ['as'=> 'admin.serviceCategoryTranslations.destroy', 'uses' => 'Admin\ServiceCategoryTranslationController@destroy']);
	Route::get('admin/serviceCategoryTranslations/{serviceCategoryTranslations}', ['as'=> 'admin.serviceCategoryTranslations.show', 'uses' => 'Admin\ServiceCategoryTranslationController@show']);
	Route::get('admin/serviceCategoryTranslations/{serviceCategoryTranslations}/edit', ['as'=> 'admin.serviceCategoryTranslations.edit', 'uses' => 'Admin\ServiceCategoryTranslationController@edit']);


	Route::get('admin/serviceTranslations', ['as'=> 'admin.serviceTranslations.index', 'uses' => 'Admin\ServiceTranslationController@index']);
	Route::post('admin/serviceTranslations', ['as'=> 'admin.serviceTranslations.store', 'uses' => 'Admin\ServiceTranslationController@store']);
	Route::get('admin/serviceTranslations/create', ['as'=> 'admin.serviceTranslations.create', 'uses' => 'Admin\ServiceTranslationController@create']);
	Route::put('admin/serviceTranslations/{serviceTranslations}', ['as'=> 'admin.serviceTranslations.update', 'uses' => 'Admin\ServiceTranslationController@update']);
	Route::patch('admin/serviceTranslations/{serviceTranslations}', ['as'=> 'admin.serviceTranslations.update', 'uses' => 'Admin\ServiceTranslationController@update']);
	Route::delete('admin/serviceTranslations/{serviceTranslations}', ['as'=> 'admin.serviceTranslations.destroy', 'uses' => 'Admin\ServiceTranslationController@destroy']);
	Route::get('admin/serviceTranslations/{serviceTranslations}', ['as'=> 'admin.serviceTranslations.show', 'uses' => 'Admin\ServiceTranslationController@show']);
	Route::get('admin/serviceTranslations/{serviceTranslations}/edit', ['as'=> 'admin.serviceTranslations.edit', 'uses' => 'Admin\ServiceTranslationController@edit']);


	Route::get('admin/eventCategories', ['as'=> 'admin.eventCategories.index', 'uses' => 'Admin\EventCategoryTranslationController@index']);
	Route::post('admin/eventCategories', ['as'=> 'admin.eventCategories.store', 'uses' => 'Admin\EventCategoryTranslationController@store']);
	Route::get('admin/eventCategories/create', ['as'=> 'admin.eventCategories.create', 'uses' => 'Admin\EventCategoryTranslationController@create']);
	Route::put('admin/eventCategories/{eventCategories}', ['as'=> 'admin.eventCategories.update', 'uses' => 'Admin\EventCategoryTranslationController@update']);
	Route::patch('admin/eventCategories/{eventCategories}', ['as'=> 'admin.eventCategories.update', 'uses' => 'Admin\EventCategoryTranslationController@update']);
	Route::delete('admin/eventCategories/{eventCategories}', ['as'=> 'admin.eventCategories.destroy', 'uses' => 'Admin\EventCategoryTranslationController@destroy']);
	Route::get('admin/eventCategories/{eventCategories}', ['as'=> 'admin.eventCategories.show', 'uses' => 'Admin\EventCategoryTranslationController@show']);
	Route::get('admin/eventCategories/{eventCategories}/edit', ['as'=> 'admin.eventCategories.edit', 'uses' => 'Admin\EventCategoryTranslationController@edit']);


	Route::get('admin/events', ['as'=> 'admin.events.index', 'uses' => 'Admin\EventTranslationController@index']);
	Route::post('admin/events', ['as'=> 'admin.events.store', 'uses' => 'Admin\EventTranslationController@store']);
	Route::get('admin/events/create', ['as'=> 'admin.events.create', 'uses' => 'Admin\EventTranslationController@create']);
	Route::put('admin/events/{event}', ['as'=> 'admin.events.update', 'uses' => 'Admin\EventTranslationController@update']);
	Route::patch('admin/events/{event}', ['as'=> 'admin.events.update', 'uses' => 'Admin\EventTranslationController@update']);
	Route::delete('admin/events/{event}', ['as'=> 'admin.events.destroy', 'uses' => 'Admin\EventTranslationController@destroy']);
	Route::get('admin/events/{event}', ['as'=> 'admin.events.show', 'uses' => 'Admin\EventTranslationController@show']);
	Route::get('admin/events/{event}/edit', ['as'=> 'admin.events.edit', 'uses' => 'Admin\EventTranslationController@edit']);


	Route::get('admin/rols', ['as'=> 'admin.rols.index', 'uses' => 'Admin\RoleController@index']);
	Route::post('admin/rols', ['as'=> 'admin.rols.store', 'uses' => 'Admin\RoleController@store']);
	Route::get('admin/rols/create', ['as'=> 'admin.rols.create', 'uses' => 'Admin\RoleController@create']);
	Route::put('admin/rols/{rols}', ['as'=> 'admin.rols.update', 'uses' => 'Admin\RoleController@update']);
	Route::patch('admin/rols/{rols}', ['as'=> 'admin.rols.update', 'uses' => 'Admin\RoleController@update']);
	Route::delete('admin/rols/{rols}', ['as'=> 'admin.rols.destroy', 'uses' => 'Admin\RoleController@destroy']);
	Route::get('admin/rols/{rols}', ['as'=> 'admin.rols.show', 'uses' => 'Admin\RoleController@show']);
	Route::get('admin/rols/{rols}/edit', ['as'=> 'admin.rols.edit', 'uses' => 'Admin\RoleController@edit']);


	Route::get('admin/bookings', ['as'=> 'admin.bookings.index', 'uses' => 'Admin\BookingController@index']);
	Route::post('admin/bookings', ['as'=> 'admin.bookings.store', 'uses' => 'Admin\BookingController@store']);
	Route::get('admin/bookings/create', ['as'=> 'admin.bookings.create', 'uses' => 'Admin\BookingController@create']);
	Route::put('admin/bookings/{bookings}', ['as'=> 'admin.bookings.update', 'uses' => 'Admin\BookingController@update']);
	Route::patch('admin/bookings/{bookings}', ['as'=> 'admin.bookings.update', 'uses' => 'Admin\BookingController@update']);
	Route::delete('admin/bookings/{bookings}', ['as'=> 'admin.bookings.destroy', 'uses' => 'Admin\BookingController@destroy']);
	Route::get('admin/bookings/{bookings}', ['as'=> 'admin.bookings.show', 'uses' => 'Admin\BookingController@show']);
	Route::get('admin/bookings/{bookings}/edit', ['as'=> 'admin.bookings.edit', 'uses' => 'Admin\BookingController@edit']);


	Route::get('admin/bookingDetails', ['as'=> 'admin.bookingDetails.index', 'uses' => 'Admin\BookingDetailController@index']);
	Route::post('admin/bookingDetails', ['as'=> 'admin.bookingDetails.store', 'uses' => 'Admin\BookingDetailController@store']);
	Route::get('admin/bookingDetails/create', ['as'=> 'admin.bookingDetails.create', 'uses' => 'Admin\BookingDetailController@create']);
	Route::put('admin/bookingDetails/{bookingDetails}', ['as'=> 'admin.bookingDetails.update', 'uses' => 'Admin\BookingDetailController@update']);
	Route::patch('admin/bookingDetails/{bookingDetails}', ['as'=> 'admin.bookingDetails.update', 'uses' => 'Admin\BookingDetailController@update']);
	Route::delete('admin/bookingDetails/{bookingDetails}', ['as'=> 'admin.bookingDetails.destroy', 'uses' => 'Admin\BookingDetailController@destroy']);
	Route::get('admin/bookingDetails/{bookingDetails}', ['as'=> 'admin.bookingDetails.show', 'uses' => 'Admin\BookingDetailController@show']);
	Route::get('admin/bookingDetails/{bookingDetails}/edit', ['as'=> 'admin.bookingDetails.edit', 'uses' => 'Admin\BookingDetailController@edit']);


	Route::get('admin/newsletterUsers', ['as'=> 'admin.newsletterUsers.index', 'uses' => 'Admin\NewsletterUserController@index']);
	Route::post('admin/newsletterUsers', ['as'=> 'admin.newsletterUsers.store', 'uses' => 'Admin\NewsletterUserController@store']);
	Route::get('admin/newsletterUsers/create', ['as'=> 'admin.newsletterUsers.create', 'uses' => 'Admin\NewsletterUserController@create']);
	Route::put('admin/newsletterUsers/{newsletterUsers}', ['as'=> 'admin.newsletterUsers.update', 'uses' => 'Admin\NewsletterUserController@update']);
	Route::patch('admin/newsletterUsers/{newsletterUsers}', ['as'=> 'admin.newsletterUsers.update', 'uses' => 'Admin\NewsletterUserController@update']);
	Route::delete('admin/newsletterUsers/{newsletterUsers}', ['as'=> 'admin.newsletterUsers.destroy', 'uses' => 'Admin\NewsletterUserController@destroy']);
	Route::get('admin/newsletterUsers/{newsletterUsers}', ['as'=> 'admin.newsletterUsers.show', 'uses' => 'Admin\NewsletterUserController@show']);
	Route::get('admin/newsletterUsers/{newsletterUsers}/edit', ['as'=> 'admin.newsletterUsers.edit', 'uses' => 'Admin\NewsletterUserController@edit']);


	Route::get('admin/multimedia', ['as'=> 'admin.multimedia.index', 'uses' => 'Admin\MultimediaController@index']);
	Route::post('admin/multimedia', ['as'=> 'admin.multimedia.store', 'uses' => 'Admin\MultimediaController@store']);
	Route::get('admin/multimedia/create', ['as'=> 'admin.multimedia.create', 'uses' => 'Admin\MultimediaController@create']);
	Route::put('admin/multimedia/{multimedia}', ['as'=> 'admin.multimedia.update', 'uses' => 'Admin\MultimediaController@update']);
	Route::patch('admin/multimedia/{multimedia}', ['as'=> 'admin.multimedia.update', 'uses' => 'Admin\MultimediaController@update']);
	Route::delete('admin/multimedia/{multimedia}', ['as'=> 'admin.multimedia.destroy', 'uses' => 'Admin\MultimediaController@destroy']);
	Route::get('admin/multimedia/{multimedia}', ['as'=> 'admin.multimedia.show', 'uses' => 'Admin\MultimediaController@show']);
	Route::get('admin/multimedia/{multimedia}/edit', ['as'=> 'admin.multimedia.edit', 'uses' => 'Admin\MultimediaController@edit']);


	Route::get('admin/seoTranslations', ['as'=> 'admin.seoTranslations.index', 'uses' => 'Admin\SeoTranslationController@index']);
	Route::post('admin/seoTranslations', ['as'=> 'admin.seoTranslations.store', 'uses' => 'Admin\SeoTranslationController@store']);
	Route::get('admin/seoTranslations/create', ['as'=> 'admin.seoTranslations.create', 'uses' => 'Admin\SeoTranslationController@create']);
	Route::put('admin/seoTranslations/{seoTranslations}', ['as'=> 'admin.seoTranslations.update', 'uses' => 'Admin\SeoTranslationController@update']);
	Route::patch('admin/seoTranslations/{seoTranslations}', ['as'=> 'admin.seoTranslations.update', 'uses' => 'Admin\SeoTranslationController@update']);
	Route::delete('admin/seoTranslations/{seoTranslations}', ['as'=> 'admin.seoTranslations.destroy', 'uses' => 'Admin\SeoTranslationController@destroy']);
	Route::get('admin/seoTranslations/{seoTranslations}', ['as'=> 'admin.seoTranslations.show', 'uses' => 'Admin\SeoTranslationController@show']);
	Route::get('admin/seoTranslations/{seoTranslations}/edit', ['as'=> 'admin.seoTranslations.edit', 'uses' => 'Admin\SeoTranslationController@edit']);


	Route::get('admin/tagTranslations', ['as'=> 'admin.tagTranslations.index', 'uses' => 'Admin\TagTranslationController@index']);
	Route::post('admin/tagTranslations', ['as'=> 'admin.tagTranslations.store', 'uses' => 'Admin\TagTranslationController@store']);
	Route::get('admin/tagTranslations/create', ['as'=> 'admin.tagTranslations.create', 'uses' => 'Admin\TagTranslationController@create']);
	Route::put('admin/tagTranslations/{tagTranslations}', ['as'=> 'admin.tagTranslations.update', 'uses' => 'Admin\TagTranslationController@update']);
	Route::post('admin/tagTranslations/{tagTranslations}', ['as'=> 'admin.tagTranslations.update', 'uses' => 'Admin\TagTranslationController@update']);
	Route::delete('admin/tagTranslations/{tagTranslations}', ['as'=> 'admin.tagTranslations.destroy', 'uses' => 'Admin\TagTranslationController@destroy']);
	Route::get('admin/tagTranslations/{tagTranslations}', ['as'=> 'admin.tagTranslations.show', 'uses' => 'Admin\TagTranslationController@show']);
	Route::get('admin/tagTranslations/{tagTranslations}/edit', ['as'=> 'admin.tagTranslations.edit', 'uses' => 'Admin\TagTranslationController@edit']);


    Route::get('admin/tagTranslations/{tagTranslations}/beforeEdit', ['as'=> 'admin.tagTranslations.beforeEdit', 'uses' => 'Admin\TagTranslationController@beforeEdit']);
    Route::patch('admin/tagTranslations/{tagTranslations}', ['as'=> 'admin.tagTranslations.preparedEdit', 'uses' => 'Admin\TagTranslationController@preparedEdit']);

    Route::name('admin.modal_galery.galery.saveGalery')->post('/modal_galery/galery/{id}/saveGalery', 'Admin\MultimediaController@saveGalery');

    /*Route::name('admin.modal_galery.galery.saveGalery')->post('/modal_galery/galery/{id}/saveGalery', 'Admin\MultimediaController@saveGalery');

    Route::name('admin.modal_galery.galery.deleteGalery')->get('/modal_galery/galery/{id_miscellaneus}/{id}/deleteGalery', 'Admin\MultimediaController@deleteGalery');
    Route::name('admin.modal_galery.galery.saveGaleryOfStorage')->post('/modal_galery/galery/saveGaleryOfStorage', 'Admin\MultimediaController@saveGaleryOfStorage');*/

    Route::name('admin.modal_galery.galery.saveGalery')->post('/modal_galery/galery/{id}/saveGalery', 'Admin\ProductTranslationController@saveGalery');
    Route::name('admin.modal_galery.galery.deleteGalery')->get('/modal_galery/galery/{id_multimedia}/{id_object}/deleteGalery', 'Admin\ProductTranslationController@deleteGalery');
    Route::name('admin.modal_galery.galery.saveGaleryOfStorage')->post('/modal_galery/galery/saveGaleryOfStorage', 'Admin\ProductTranslationController@saveGaleryOfStorage');

		Route::get('admin/requests', ['as'=> 'admin.requests.index', 'uses' => 'Admin\RequestController@index']);
		Route::post('admin/requests', ['as'=> 'admin.requests.store', 'uses' => 'Admin\RequestController@store']);
		Route::get('admin/requests/create', ['as'=> 'admin.requests.create', 'uses' => 'Admin\RequestController@create']);
		Route::put('admin/requests/{requests}', ['as'=> 'admin.requests.update', 'uses' => 'Admin\RequestController@update']);
		Route::patch('admin/requests/{requests}', ['as'=> 'admin.requests.update', 'uses' => 'Admin\RequestController@update']);
		Route::delete('admin/requests/{requests}', ['as'=> 'admin.requests.destroy', 'uses' => 'Admin\RequestController@destroy']);
		Route::get('admin/requests/{requests}', ['as'=> 'admin.requests.show', 'uses' => 'Admin\RequestController@show']);
		Route::get('admin/requests/{requests}/edit', ['as'=> 'admin.requests.edit', 'uses' => 'Admin\RequestController@edit']);




    //Route::name('admin.tagTranslations.beforeEdit')->post('/admin/tagTranslations/{id}/beforeEdit', 'Admin\TagTranslationController@beforeEdit');
});


Route::get('{any}',function(){
    return view('home.index');
})->where('any','.*');


Route::get('admin/roles', ['as'=> 'admin.roles.index', 'uses' => 'Admin\RolController@index']);
Route::post('admin/roles', ['as'=> 'admin.roles.store', 'uses' => 'Admin\RolController@store']);
Route::get('admin/roles/create', ['as'=> 'admin.roles.create', 'uses' => 'Admin\RolController@create']);
Route::put('admin/roles/{roles}', ['as'=> 'admin.roles.update', 'uses' => 'Admin\RolController@update']);
Route::patch('admin/roles/{roles}', ['as'=> 'admin.roles.update', 'uses' => 'Admin\RolController@update']);
Route::delete('admin/roles/{roles}', ['as'=> 'admin.roles.destroy', 'uses' => 'Admin\RolController@destroy']);
Route::get('admin/roles/{roles}', ['as'=> 'admin.roles.show', 'uses' => 'Admin\RolController@show']);
Route::get('admin/roles/{roles}/edit', ['as'=> 'admin.roles.edit', 'uses' => 'Admin\RolController@edit']);



