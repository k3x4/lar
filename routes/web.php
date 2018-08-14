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

Route::get('/password/reset/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/social/redirect/{provider}', [
            'as' => 'social.redirect',
            'uses' => 'Auth\SocialController@getSocialRedirect'
]);
Route::get('/social/handle/{provider}', [
            'as' => 'social.handle',
            'uses' => 'Auth\SocialController@getSocialHandle'
]);


// LISTINGS
Route::get('/listing/{slug}', [
    'as' => 'listing.show', 
    'uses' => 'ListingController@show', 
]);

// LISTINGS CATEGORIES
Route::get('/category/{slug}', [
    'as' => 'category.show', 
    'uses' => 'CategoryController@show', 
]);


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


    // USERS
    Route::get('admin/users', [
        'as' => 'admin.users.index', 
        'uses' => 'UserController@index', 
        'middleware' => ['permission:user-read|user-create|user-edit|user-delete']
        ]);

    Route::get('admin/users/data', [
        'as' => 'admin.users.data',
        'uses' => 'UserController@data',
        'middleware' => ['permission:user-read'],
    ]);    
    
    Route::get('admin/users/create', [
        'as' => 'admin.users.create', 
        'uses' => 'UserController@create', 
        'middleware' => ['permission:user-create']
        ]);
    
    Route::post('admin/users/create', [
        'as' => 'admin.users.store', 
        'uses' => 'UserController@store', 
        'middleware' => ['permission:user-create']
        ]);
    
    Route::get('admin/users/{id}/edit', [
        'as' => 'admin.users.edit', 
        'uses' => 'UserController@edit', 
        'middleware' => ['permission:user-edit']
        ]);
    
    Route::patch('admin/users/{id}', [
        'as' => 'admin.users.update', 
        'uses' => 'UserController@update', 
        'middleware' => ['permission:user-edit']
        ]);
    
    Route::delete('admin/users/destroy', [
        'as' => 'admin.users.destroy', 
        'uses' => 'UserController@destroy', 
        'middleware' => ['permission:user-delete']
        ]);
    
    
    // ROLES
    Route::get('admin/roles', [
        'as' => 'admin.roles.index', 
        'uses' => 'RoleController@index', 
        'middleware' => ['permission:role-read|role-create|role-edit|role-delete']
        ]);

    Route::get('admin/roles/data', [
        'as' => 'admin.roles.data',
        'uses' => 'RoleController@data',
        'middleware' => ['permission:role-read'],
    ]);      
    
    Route::get('admin/roles/create', [
        'as' => 'admin.roles.create', 
        'uses' => 'RoleController@create', 
        'middleware' => ['permission:role-create']
        ]);
    
    Route::post('admin/roles/create', [
        'as' => 'admin.roles.store', 
        'uses' => 'RoleController@store', 
        'middleware' => ['permission:role-create']
        ]);
    
    Route::get('admin/roles/{id}/edit', [
        'as' => 'admin.roles.edit', 
        'uses' => 'RoleController@edit', 
        'middleware' => ['permission:role-edit']
        ]);
    
    Route::patch('admin/roles/{id}', [
        'as' => 'admin.roles.update', 
        'uses' => 'RoleController@update', 
        'middleware' => ['permission:role-edit']
        ]);
    
    Route::delete('admin/roles/destroy', [
        'as' => 'admin.roles.destroy', 
        'uses' => 'RoleController@destroy', 
        'middleware' => ['permission:role-delete']
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

    Route::get('admin/media/datapopup', [
        'as' => 'admin.media.datapopup',
        'uses' => 'MediaController@datapopup',
        'middleware' => ['permission:media-read'],
    ]);

    Route::post('admin/media/store', [
        'as' => 'admin.media.store',
        'uses' => 'MediaController@store',
        'middleware' => ['permission:media-create'],
    ]);

    Route::delete('admin/media/destroy', [
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

    Route::get('admin/listings/author/{id}', [
        'as' => 'admin.listings.indexByAuthor',
        'uses' => 'ListingController@indexByAuthor',
        'middleware' => ['permission:listing-read'],
    ]);

    Route::get('admin/listings/data', [
        'as' => 'admin.listings.data',
        'uses' => 'ListingController@data',
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

    Route::delete('admin/listings/destroy', [
        'as' => 'admin.listings.destroy',
        'uses' => 'ListingController@destroy',
        'middleware' => ['permission:listing-delete'],
    ]);


    //CATEGORIES
    Route::get('admin/categories', [
        'as' => 'admin.categories.index', 
        'uses' => 'CategoryController@index', 
        'middleware' => ['permission:category-read|category-create|category-edit|category-delete']
        ]);

    Route::get('admin/categories/data', [
        'as' => 'admin.categories.data',
        'uses' => 'CategoryController@data',
        'middleware' => ['permission:category-read'],
    ]);    
    
    Route::get('admin/categories/create', [
        'as' => 'admin.categories.create', 
        'uses' => 'CategoryController@create', 
        'middleware' => ['permission:category-create']
        ]);
    
    Route::post('admin/categories/create', [
        'as' => 'admin.categories.store', 
        'uses' => 'CategoryController@store', 
        'middleware' => ['permission:category-create']
        ]);
    
    Route::get('admin/categories/{id}/edit', [
        'as' => 'admin.categories.edit', 
        'uses' => 'CategoryController@edit', 
        'middleware' => ['permission:category-edit']
        ]);
    
    Route::patch('admin/categories/{id}', [
        'as' => 'admin.categories.update', 
        'uses' => 'CategoryController@update', 
        'middleware' => ['permission:category-edit']
        ]);
    
    Route::delete('admin/categories/destroy', [
        'as' => 'admin.categories.destroy', 
        'uses' => 'CategoryController@destroy', 
        'middleware' => ['permission:category-delete']
        ]);


}
);
