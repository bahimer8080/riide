<?php
use Illuminate\Support\Facades\App;
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

Route::get('/search/{search}', 'MallController@search');

Route::get('/', function () {
    //App::setLocale("en");
    //dd( App::isLocale('es'));
    return view('welcome');
    //return view('selectLang');
});

Route::get('/seleccione-idioma', function () {
  return view('selectLang');
})->name("lang");


Route::get('/{lang}/bienvenido', function($lang){
    App::setLocale($lang);
    return view('slider');
})->name("wel");


//FeaturedProductController
//getFeaturedProduct
Route::get('/featured-product', 'FeaturedProductController@getFeaturedProduct');
//Route::get('/product-', 'FeaturedProductController@getFeaturedProduct');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/select-type-user', 'MallController@selectTypeUser');
Route::get('/mall', 'MallController@index')->name('mall');
Route::get('/mall/{id}', 'MallController@subCategory');
Route::get('/store/{id}', 'MallController@store');
Route::get('/product/{id}', 'MallController@product');
Route::get('/promotion', 'MallController@promotion');
Route::get('/search/{search}', 'MallController@search');


//ADMIN
Route::get('/admin', 'AdminController@index')->name("admin");
Route::get('/admin/stores/{pagination}', 'AdminController@getStores')->name("admin/stores");
Route::get('/admin/stores/state/{pagination}/{store}/{state}', 'AdminController@setStateStore');

Route::get('/admin/riders/{pagination}', 'AdminController@getRiders')->name("admin-riders");
Route::get('/admin/riders/state/{pagination}/{rider}/{state}', 'AdminController@setStateRider');

Route::get('/admin/categories/{pagination}', 'AdminController@categories');
Route::get('/admin/categories/{category}/{pagination}', 'AdminController@subcategories');
Route::get('/admin/categories/delete/{category}/{pagination}/{id}', 'AdminController@categoryDelete');

Route::get('/admin/create/categories/{id}', 'AdminController@createCategory');
Route::post('/admin/put/categories', 'AdminController@putCategory');

Route::get('/admin/update/categories/{id}', 'AdminController@updateCategory');
Route::post('/admin/post/categories', 'AdminController@postCategory');

Route::get('/admin/store', 'AdminController@adminStore');
Route::get('/admin/store/list/sliders/{category}', 'AdminController@listSliders');
Route::get('/admin/store/{slider_id}/{category}', 'AdminController@getSlider');
Route::get('/admin/store/{category}/delete/{slider_id}/{banner_id}', 'AdminController@deleteBannerOfSlider');
Route::get('/admin/store/{category}/assign/{slider_id}/{banner_id}', 'AdminController@assignBannerOfSlider');
Route::get('/admin/store/create/slider/{category}', 'AdminController@createSlider');


// ADMIN STORE
Route::get('/store-admin/', 'AdminStoreController@index');

Route::get('/store-admin/store/option', 'AdminStoreController@storeOption');
Route::get('/store-admin/store/edit', 'AdminStoreController@storeEditInfo');
Route::post('/store-admin/store/post', 'AdminStoreController@storeUpdateData');

Route::get('/store-admin/store/time/edit', 'AdminStoreController@timeEdit');
Route::post('/store-admin/store/time/update', 'AdminStoreController@timeUpdate');

//storeUpdateData

Route::get('/store-admin/store/{store_id}', 'AdminStoreController@getOptionStore');
Route::get('/store-admin/products/{pagination}', 'AdminStoreController@getProducts');
Route::get('/store-admin/create/products', 'AdminStoreController@createProduct');
Route::post('/store-admin/post/products', 'AdminStoreController@postProduct');
Route::get('/store-admin/edit/products/{product_id}', 'AdminStoreController@editProduct');
Route::post('/store-admin/update/products/{product_id}', 'AdminStoreController@updateProduct');
Route::get('/store-admin/delete/products/{product_id}', 'AdminStoreController@deleteProduct');
Route::get('/store-admin/featured/products/{product_id}', 'AdminStoreController@featuredProduct');
Route::get('/store-admin/nofeatured/products/{product_id}', 'AdminStoreController@noFeaturedProduct');


Route::get('/store-admin/banners/{pagination}', 'AdminStoreController@getBanners');
Route::get('/store-admin/create/banners/', 'AdminStoreController@createBanners');
Route::post('/store-admin/post/banners/', 'AdminStoreController@postBanners');
Route::get('/store-admin/edit/banners/{banner_id}', 'AdminStoreController@editBanner');
Route::post('/store-admin/update/banners/{banner_id}', 'AdminStoreController@updateBanner');
Route::get('/store-admin/delete/banners/{banner_id}', 'AdminStoreController@deleteBanner');
// ADMIN STORE


//Route::get('/admin/{option}', 'AdminController@option')->name("admin-option");
//Route::get('/admin/{option}/{id}', 'AdminController@index')->name("admin-option-id");

//ADMIN





Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('auth/{provider}', 'Auth\FacebookAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\FacebookAuthController@handleProviderCallback');