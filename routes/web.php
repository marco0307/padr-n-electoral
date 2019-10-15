<?php

Auth::routes();
Route::get('/', function () {return view('auth/login');})->name('inicio')->middleware('guest');

//Perfil de usuario
Route::get('/perfil','AdminController@perfil')->name('perfil');
Route::get('/perfil/editar','AdminController@editPerfil')->name('edit_perfil');
Route::put('/users/{id}','AdminController@updatePerfil')->name('updatePerfil');
Route::get('/users/password','AdminController@editPassword')->name('edit_password');
Route::put('/password/{id}','AdminController@updatePassword')->name('update_password');

/*Inicio User*/
Route::get('/inicio','AdminController@index')->name('index');

/*Rutas de Administrador*/
Route::resource('/user', 'AdminController');
//CRUD de usuarios
Route::get('/crear/user','AdminController@create')->name('crear_user');
Route::get('/lista/user','AdminController@userList')->name('lista_user');
Route::get('/user/{slug}','AdminController@show')->name('ver_user');
Route::get('/user/{slug}/edit','AdminController@edit')->name('editar_user');
Route::get('/MilitantesProvincia','AdminController@estadisticaMilitantesProvincia');


//CRUD de grupos
Route::resource('/grupo', 'GrupoController');
Route::get('/crear/grupo','GrupoController@create')->name('crear_grupo');
Route::get('/lista/grupo','GrupoController@index')->name('lista_grupo');
Route::get('/grupo/{slug}','GrupoController@show')->name('ver_grupo');
Route::get('/grupo/{slug}/edit','GrupoController@edit')->name('editar_grupo');

//CRUD de militantes
Route::resource('/militante', 'MilitanteController');
Route::get('/crear/militante','MilitanteController@create')->name('crear_militante');
Route::get('/municipios/{id}','MilitanteController@municipios');
Route::get('/sectores/{id}','MilitanteController@sectores');
Route::get('/lista/militante','MilitanteController@index')->name('lista_militante');
Route::get('/galeria/militante','MilitanteController@galeria')->name('galeria_militante');
Route::get('/militante/{slug}','MilitanteController@show')->name('ver_militante');
Route::get('/militante/{slug}/edit','MilitanteController@edit')->name('editar_militante');
Route::get('/reportes','MilitanteController@reportes')->name('reportes');
Route::get('/exportar/militante','MilitanteController@exportarExel')->name('exportar_exel');
Route::post('/exportar/exel','MilitanteController@export')->name('export');
