<?php

use Illuminate\Support\Facades\Route;

Route::namespace('\Plugrbase\EnvBar\Http\Controllers')->prefix('envbar/settings/')->name('plugrbase.envbar.settings.')->group(function () {
    Route::get('/', 'EnvBarController@index')->name('index');
    Route::put('/', 'EnvBarController@update')->name('update');
});
