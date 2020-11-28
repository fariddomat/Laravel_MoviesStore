<?php



Route::prefix('profile')
    ->name('profile.')
    ->middleware(['auth', 'role:super_admin|admin|user'])
    ->group(function () {
        Route::get('/', 'ProfileControlller@index')->name('index');
        Route::get('/movie', 'ProfileControlller@movies')->name('movies');
        Route::get('/edit', 'ProfileControlller@edit')->name('edit');
        Route::put('/update', 'ProfileControlller@update')->name('update');

        Route::get('/change-password', 'ChangePasswordController@index');
        Route::post('/change-password', 'ChangePasswordController@store')->name('change.password');
    });
