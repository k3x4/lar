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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth'],
], function () {

    // ADMIN PANEL
    Route::get('admin', [
        'as' => 'admin.index',
        'middleware' => 'role:admin|editor|author',
        'uses' => 'AdminController@index',
    ]);

    // MEDIA
    Route::get('admin/media', [
        'as' => 'admin.media.index',
        'uses' => 'MediaController@index',
        'middleware' => ['permission:media-read'],
    ]);

    Route::get('admin/media/data', [
        'as' => 'admin.media.data',
        'uses' => 'MediaController@data',
        'middleware' => ['permission:media-read'],
    ]);

    Route::post('admin/media/store', [
        'as' => 'admin.media.store',
        'uses' => 'MediaController@store',
        'middleware' => ['permission:media-create'],
    ]);

    Route::post('admin/media/destroy', [
        'as' => 'admin.media.destroy',
        'uses' => 'MediaController@destroy',
        'middleware' => ['permission:media-delete'],
    ]);

    //MEDIA SIZES
    Route::get('admin/mediasizes', [
        'as' => 'admin.mediasizes.index',
        'uses' => 'MediaSizeController@index',
        'middleware' => ['permission:mediasize-read'],
    ]);

    Route::get('admin/mediasizes/data', [
        'as' => 'admin.mediasizes.data',
        'uses' => 'MediaSizeController@data',
        'middleware' => ['permission:mediasize-read'],
    ]);

    Route::get('admin/mediasizes/create', [
        'as' => 'admin.mediasizes.create',
        'uses' => 'MediaSizeController@create',
        'middleware' => ['permission:mediasize-create'],
    ]);

    Route::post('admin/mediasizes/create', [
        'as' => 'admin.mediasizes.store',
        'uses' => 'MediaSizeController@store',
        'middleware' => ['permission:mediasize-create'],
    ]);

    Route::get('admin/mediasizes/{id}/edit', [
        'as' => 'admin.mediasizes.edit',
        'uses' => 'MediaSizeController@edit',
        'middleware' => ['permission:mediasize-edit'],
    ]);

    Route::patch('admin/mediasizes/{id}', [
        'as' => 'admin.mediasizes.update',
        'uses' => 'MediaSizeController@update',
        'middleware' => ['permission:mediasize-edit'],
    ]);

    /*
    Route::delete('admin/mediasizes/{id}', [
        'as' => 'admin.mediasizes.destroy',
        'uses' => 'MediaSizeController@destroy',
        'middleware' => ['permission:mediasize-delete'],
    ]);
    */

    Route::delete('admin/mediasizes/destroy', [
        'as' => 'admin.mediasizes.destroy',
        'uses' => 'MediaSizeController@destroy',
        'middleware' => ['permission:mediasize-delete'],
    ]);

    //LISTINGS
    Route::get('admin/listings', [
        'as' => 'admin.listings.index',
        'uses' => 'ListingController@index',
        'middleware' => ['permission:listing-read'],
    ]);

    Route::get('admin/listings/create', [
        'as' => 'admin.listings.create',
        'uses' => 'ListingController@create',
        'middleware' => ['permission:listing-create'],
    ]);

    Route::post('admin/listings/create', [
        'as' => 'admin.listings.store',
        'uses' => 'ListingController@store',
        'middleware' => ['permission:listing-create'],
    ]);

    Route::get('admin/listings/{id}/edit', [
        'as' => 'admin.listings.edit',
        'uses' => 'ListingController@edit',
        'middleware' => ['permission:listing-edit'],
    ]);

    Route::patch('admin/listings/{id}', [
        'as' => 'admin.listings.update',
        'uses' => 'ListingController@update',
        'middleware' => ['permission:listing-edit'],
    ]);

    Route::delete('admin/listings/{id}', [
        'as' => 'admin.listings.destroy',
        'uses' => 'ListingController@destroy',
        'middleware' => ['permission:listing-delete'],
    ]);

}
);
