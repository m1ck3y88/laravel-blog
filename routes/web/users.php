<?php

use Illuminate\Support\Facades\Route;


Route::get('admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');

Route::put('admin/users/{user}/update', 'UserController@update')->name('user.profile.update');

Route::delete('admin/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');

Route::middleware(['role:admin','auth'])->group(function(){

    Route::get('admin/users', 'UserController@index')->name('users.index');
});

Route::middleware(['can:view,user'])->group(function(){
    Route::get('admin/users/{user}/profile', 'UserController@show')->name('user.profile.show');

});