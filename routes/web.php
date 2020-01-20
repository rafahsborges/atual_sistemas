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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/', 'AdminUsersController@index')->name('index');
            Route::get('/create', 'AdminUsersController@create')->name('create');
            Route::post('/', 'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/edit', 'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}', 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}', 'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation', 'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::get('/profile', 'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile', 'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password', 'ProfileController@editPassword')->name('edit-password');
        Route::post('/password', 'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('planos')->name('planos/')->group(static function () {
            Route::get('/', 'PlanoController@index')->name('index');
            Route::get('/create', 'PlanoController@create')->name('create');
            Route::post('/', 'PlanoController@store')->name('store');
            Route::get('/{plano}/edit', 'PlanoController@edit')->name('edit');
            Route::post('/bulk-destroy', 'PlanoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{plano}', 'PlanoController@update')->name('update');
            Route::delete('/{plano}', 'PlanoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('parentescos')->name('parentescos/')->group(static function () {
            Route::get('/', 'ParentescoController@index')->name('index');
            Route::get('/create', 'ParentescoController@create')->name('create');
            Route::post('/', 'ParentescoController@store')->name('store');
            Route::get('/{parentesco}/edit', 'ParentescoController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ParentescoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{parentesco}', 'ParentescoController@update')->name('update');
            Route::delete('/{parentesco}', 'ParentescoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('estado-civils')->name('estado-civils/')->group(static function () {
            Route::get('/', 'EstadoCivilController@index')->name('index');
            Route::get('/create', 'EstadoCivilController@create')->name('create');
            Route::post('/', 'EstadoCivilController@store')->name('store');
            Route::get('/{estadoCivil}/edit', 'EstadoCivilController@edit')->name('edit');
            Route::post('/bulk-destroy', 'EstadoCivilController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{estadoCivil}', 'EstadoCivilController@update')->name('update');
            Route::delete('/{estadoCivil}', 'EstadoCivilController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('clientes')->name('clientes/')->group(static function () {
            Route::get('/', 'ClienteController@index')->name('index');
            Route::get('/create', 'ClienteController@create')->name('create');
            Route::post('/', 'ClienteController@store')->name('store');
            Route::get('/{cliente}/edit', 'ClienteController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ClienteController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cliente}', 'ClienteController@update')->name('update');
            Route::delete('/{cliente}', 'ClienteController@destroy')->name('destroy');
        });
    });
});
