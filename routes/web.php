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


//vistas principales
/*Route::get ( '/', 'SubscriptionController@index' )->name ( 'home' );
Route::post ( '/', 'SubscriptionController@store' )->name ( 'subscription.store' );
Route::view ( '/seguridad', 'secure' )->name ( 'secure' );*/


//Ruta de Home
Route::view ( '/', 'index' )->name ( 'home' );

//Ruta dpagina de seguridad
Route::view ( '/seguridad', 'secure' )->name ( 'secure' );


//auth
Auth::routes ();


//admin
Route::get ( '/home', 'HomeController@index' )->name ( 'dashboard' );
//Route::get ( '/dashboard', 'HomeController@index' )->name ( 'dashboard' )->middleware ( [ 'role:ADMIN' ] );

//Files
Route::get ( 'archivos/subir', 'FilesController@create' )->name ( 'file.create' );
Route::post ( 'archivos/subir', 'FilesController@store' )->name ( 'file.store' );
Route::get ( 'archivos/imagenes', 'FilesController@images' )->name ( 'file.images' );
Route::get ( 'archivos/videos', 'FilesController@videos' )->name ( 'file.videos' );
Route::get ( 'archivos/musica', 'FilesController@audios' )->name ( 'file.audios' );
Route::get ( 'archivos/documentos', 'FilesController@documents' )->name ( 'file.documents' );
Route::patch ( 'archivos/eliminar/{id}', 'FilesController@destroy' )->name ( 'file.destroy' );

//Roles
Route::group ( [ 'namespace' => 'Admin' ], function () {
   // Roles
   Route::group ( [ 'prefix' => 'roles' ], function () {
      Route::get ( '/', 'RolesController@index' )->name ( 'role.index' );
      Route::get ( '/agregar', 'RolesController@create' )->name ( 'role.create' );
      Route::patch ( '/agregar', 'RolesController@store' )->name ( 'role.store' );
      Route::get ( '/{id}/ver', 'RolesController@show' )->name ( 'role.show' );
      Route::get ( '/{id}/editar', 'RolesController@edit' )->name ( 'role.edit' );
      Route::patch ( '/{id}/editar', 'RolesController@update' )->name ( 'role.update' );
      Route::patch ( '/{id}/eliminar', 'RolesController@destroy' )->name ( 'role.destroy' );
   } );

   //Permissions
   Route::group ( [ 'prefix' => 'permisos' ], function () {
      Route::get ( '/', 'PermissionsController@index' )->name ( 'permissions.index' );
      Route::get ( '/agregar', 'PermissionsController@create' )->name ( 'permissions.create' );
      Route::patch ( '/agregar', 'PermissionsController@store' )->name ( 'permissions.store' );
      Route::get ( '/{id}/editar', 'PermissionsController@edit' )->name ( 'permissions.edit' );
      Route::patch ( '/{id}/editar', 'PermissionsController@update' )->name ( 'permissions.update' );
      Route::patch ( '/{id}/eliminar', 'PermissionsController@destroy' )->name ( 'permissions.destroy' );

   } );

   //Users
   Route::group ( [ 'prefix' => 'usuarios' ], function () {
      Route::get ( '/', 'UsersController@index' )->name ( 'users.index' );
      Route::get ( '/agregar', 'UsersController@create' )->name ( 'users.create' );
      Route::patch ( '/agregar', 'UsersController@store' )->name ( 'users.store' );
      Route::get ( '/{id}/ver', 'UsersController@show' )->name ( 'users.show' );
      Route::get ( '/{id}/editar', 'UsersController@edit' )->name ( 'users.edit' );
      Route::patch ( '/{id}/editar', 'UsersController@update' )->name ( 'users.update' );
      Route::patch ( '/{id}/eliminar', 'UsersController@destroy' )->name ( 'users.destroy' );

   } );

   //Plans
   Route::group ( [ 'prefix' => 'plan' ], function () {
      Route::get ( '/', 'PlansController@index' )->name ( 'plan.index' );
      Route::get ( '/agregar', 'PlansController@create' )->name ( 'plan.create' );
      Route::patch ( '/agregar', 'PlansController@store' )->name ( 'plan.store' );
      Route::get ( '/{id}/ver', 'PlansController@show' )->name ( 'plan.show' );
      Route::get ( '/{id}/editar', 'PlansController@edit' )->name ( 'plan.edit' );
      Route::patch ( '/{id}/editar', 'PlansController@update' )->name ( 'plan.update' );
      Route::patch ( '/{id}/eliminar', 'PlansController@destroy' )->name ( 'plan.destroy' );
   } );
} );





