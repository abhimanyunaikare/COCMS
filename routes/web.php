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

Auth::routes();

Route::prefix('manage')->middleware('role:superadministrator|administrator')->group(function(){
        Route::get('/', 'ManageController@index');
        Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
        Route::resource('/users','UserController');
        Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
        Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
    });

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('logout', 'Auth\LoginController@logout', function () {
//    return abort(404);
//});
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );