<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['as'=>'backend.', 'prefix'=>'admin', 'namespace'=>'Backend', 'middleware' => 'auth'], function () {
        /* START::Dashboard */
	Route::get('/', [
        'uses' => 'DashboardController@showDashboardPage',
        'as' => 'showDashboard',
    ]);
    /* END::Dashboard */
      /*  START::RolePermission */
    Route::get('/role-permission', [
        'uses' => 'RolePermissionController@create',
        'as'  => 'rolePermission',
    ]);
    Route::post('/role-store',[
        'uses' => 'RolePermissionController@store',
        'as' => 'role.store',
    ]);
    Route::get('/role-list',[
        'uses' => 'RolePermissionController@index',
        'as' => 'role.list',
    ]);
    Route::get('/role-assign-permission',[
        'uses' => 'RolePermissionController@roleAssignPermission',
        'as' => 'assignPermission',
    ]);
      /*  END::RolePermission */
});