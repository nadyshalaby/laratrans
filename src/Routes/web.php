<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function () {
    Route::get('/localize/{guard}/{locale}', 'CoreCave\\Laratrans\\Controllers\\LocaleController@getLocalize')->name('laratrans.localize');
});
