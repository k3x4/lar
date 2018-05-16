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

    //LISTINGS
    Route::get('admin/listings', [
        'as' => 'admin.listings.index',
        'uses' => 'ListingController@index',
        'middleware' => ['permission:listing-read|listing-create|listing-edit|listing-delete'],
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
