<?php

Route::resource('posts', 'PostsController', ['except' => ['create', 'edit']]);

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/**
 * Rutas relacionadas al perfil de usuario
 */
Route::get('/profile/{id}', 'ProfileController@showProfile')->name('profile');

Route::get('edit_profile', 'ProfileController@editProfile')->name('profile.edit');
Route::post('update_profile', 'ProfileController@updateProfile')->name('profile.update');

Route::post('update_profile_picture', 'ProfileController@updateProfilePicture')->name('profile.update.picture');

Route::post('upload_photo', 'PostsController@uploadPhoto')->name('posts.store');
