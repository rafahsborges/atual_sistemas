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
            Route::get('/', 'PlanosController@index')->name('index');
            Route::get('/create', 'PlanosController@create')->name('create');
            Route::post('/', 'PlanosController@store')->name('store');
            Route::get('/{plano}/edit', 'PlanosController@edit')->name('edit');
            Route::post('/bulk-destroy', 'PlanosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{plano}', 'PlanosController@update')->name('update');
            Route::delete('/{plano}', 'PlanosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('parentescos')->name('parentescos/')->group(static function () {
            Route::get('/', 'ParentescosController@index')->name('index');
            Route::get('/create', 'ParentescosController@create')->name('create');
            Route::post('/', 'ParentescosController@store')->name('store');
            Route::get('/{parentesco}/edit', 'ParentescosController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ParentescosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{parentesco}', 'ParentescosController@update')->name('update');
            Route::delete('/{parentesco}', 'ParentescosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('estado-civils')->name('estado-civils/')->group(static function () {
            Route::get('/', 'EstadoCivilsController@index')->name('index');
            Route::get('/create', 'EstadoCivilsController@create')->name('create');
            Route::post('/', 'EstadoCivilsController@store')->name('store');
            Route::get('/{estadoCivil}/edit', 'EstadoCivilsController@edit')->name('edit');
            Route::post('/bulk-destroy', 'EstadoCivilsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{estadoCivil}', 'EstadoCivilsController@update')->name('update');
            Route::delete('/{estadoCivil}', 'EstadoCivilsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('clientes')->name('clientes/')->group(static function () {
            Route::get('/', 'ClientesController@index')->name('index');
            Route::get('/create', 'ClientesController@create')->name('create');
            Route::post('/', 'ClientesController@store')->name('store');
            Route::get('/{cliente}/edit', 'ClientesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ClientesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cliente}', 'ClientesController@update')->name('update');
            Route::delete('/{cliente}', 'ClientesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function() {
        Route::prefix('dependentes')->name('dependentes/')->group(static function() {
            Route::get('/',                                             'DependentesController@index')->name('index');
            Route::get('/create',                                       'DependentesController@create')->name('create');
            Route::post('/',                                            'DependentesController@store')->name('store');
            Route::get('/{dependente}/edit',                            'DependentesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DependentesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{dependente}',                                'DependentesController@update')->name('update');
            Route::delete('/{dependente}',                              'DependentesController@destroy')->name('destroy');
        });
    });
});