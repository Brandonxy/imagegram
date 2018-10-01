<?php

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', 'PostsController', ['except' => ['create', 'edit']]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Rutas relacionadas al perfil de usuario
 */
Route::get('/profile', 'ProfileController@index')->name('profile');

Route::post('update_profile_picture', 'ProfileController@updateProfilePicture')->name('profile.update.picture');
