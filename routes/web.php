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


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('planos')->name('planos/')->group(static function() {
            Route::get('/',                                             'PlanoController@index')->name('index');
            Route::get('/create',                                       'PlanoController@create')->name('create');
            Route::post('/',                                            'PlanoController@store')->name('store');
            Route::get('/{plano}/edit',                                 'PlanoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PlanoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{plano}',                                     'PlanoController@update')->name('update');
            Route::delete('/{plano}',                                   'PlanoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('planos')->name('planos/')->group(static function() {
            Route::get('/',                                             'PlanosController@index')->name('index');
            Route::get('/create',                                       'PlanosController@create')->name('create');
            Route::post('/',                                            'PlanosController@store')->name('store');
            Route::get('/{plano}/edit',                                 'PlanosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PlanosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{plano}',                                     'PlanosController@update')->name('update');
            Route::delete('/{plano}',                                   'PlanosController@destroy')->name('destroy');
        });
    });
});