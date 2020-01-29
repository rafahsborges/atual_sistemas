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
    return redirect('/admin/login');
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
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('dependentes')->name('dependentes/')->group(static function () {
            Route::get('/', 'DependentesController@index')->name('index');
            Route::get('/create', 'DependentesController@create')->name('create');
            Route::post('/', 'DependentesController@store')->name('store');
            Route::get('/{dependente}/edit', 'DependentesController@edit')->name('edit');
            Route::post('/bulk-destroy', 'DependentesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{dependente}', 'DependentesController@update')->name('update');
            Route::delete('/{dependente}', 'DependentesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('contas')->name('contas/')->group(static function () {
            Route::get('/', 'ContasController@index')->name('index');
            Route::get('/create', 'ContasController@create')->name('create');
            Route::post('/', 'ContasController@store')->name('store');
            Route::get('/{contum}/edit', 'ContasController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ContasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contum}', 'ContasController@update')->name('update');
            Route::delete('/{contum}', 'ContasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('contratos')->name('contratos/')->group(static function () {
            Route::get('/', 'ContratosController@index')->name('index');
            Route::get('/create', 'ContratosController@create')->name('create');
            Route::post('/', 'ContratosController@store')->name('store');
            Route::get('/{contrato}/edit', 'ContratosController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ContratosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contrato}', 'ContratosController@update')->name('update');
            Route::delete('/{contrato}', 'ContratosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('contrato-parcelas')->name('contrato-parcelas/')->group(static function () {
            Route::get('/', 'ContratoParcelasController@index')->name('index');
            Route::get('/create', 'ContratoParcelasController@create')->name('create');
            Route::post('/', 'ContratoParcelasController@store')->name('store');
            Route::get('/{contratoParcela}/edit', 'ContratoParcelasController@edit')->name('edit');
            Route::post('/bulk-destroy', 'ContratoParcelasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contratoParcela}', 'ContratoParcelasController@update')->name('update');
            Route::delete('/{contratoParcela}', 'ContratoParcelasController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('boletos')->name('boletos/')->group(static function () {
            Route::get('/', 'BoletosController@index')->name('index');
            Route::get('/create', 'BoletosController@create')->name('create');
            Route::post('/', 'BoletosController@store')->name('store');
            Route::get('/{boleto}/edit', 'BoletosController@edit')->name('edit');
            Route::post('/bulk-destroy', 'BoletosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{boleto}', 'BoletosController@update')->name('update');
            Route::delete('/{boleto}', 'BoletosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('remessas')->name('remessas/')->group(static function () {
            Route::get('/', 'RemessasController@index')->name('index');
            Route::get('/create', 'RemessasController@create')->name('create');
            Route::post('/', 'RemessasController@store')->name('store');
            Route::get('/{remessa}/edit', 'RemessasController@edit')->name('edit');
            Route::post('/bulk-destroy', 'RemessasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{remessa}', 'RemessasController@update')->name('update');
            Route::delete('/{remessa}', 'RemessasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('Admin')->name('admin/')->group(static function () {
        Route::prefix('remessa-boletos')->name('remessa-boletos/')->group(static function () {
            Route::get('/', 'RemessaBoletosController@index')->name('index');
            Route::get('/create', 'RemessaBoletosController@create')->name('create');
            Route::post('/', 'RemessaBoletosController@store')->name('store');
            Route::get('/{remessaBoleto}/edit', 'RemessaBoletosController@edit')->name('edit');
            Route::post('/bulk-destroy', 'RemessaBoletosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{remessaBoleto}', 'RemessaBoletosController@update')->name('update');
            Route::delete('/{remessaBoleto}', 'RemessaBoletosController@destroy')->name('destroy');
        });
    });
});
