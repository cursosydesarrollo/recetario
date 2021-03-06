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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('recetas', 'RecetaController');

Route::resource('usuarios', 'UserController');

Route::get('users-list', 'DataTable\UserDtController@index');

Route::resource('roles', 'RolesController')->only(['index', 'edit', 'update']);

// conseguir lista de permisos
Route::middleware('api')->get('permissions', 'Api\PermissionController@index');