<?php

Route::get('/', function () {
    $user = App\User::find(1); // Usaremos 1 usuario para probar
    return view('welcome')->with('user', $user);
});

Route::resource('posts', 'PostsController', ['except' => ['create', 'edit']]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Rutas relacionadas al perfil de usuario
 */
Route::get('/profile', 'ProfileController@index')->name('profile');
