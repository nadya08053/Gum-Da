<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::group([],function(){

    Route::match(['get'],'/',['uses'=>'IndexController@index']);
    Route::post('/change_email',['uses'=>'IndexController@changeEmail']);
    $this->get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::auth();

});

Route::group(['middleware'=>'auth'], function(){

    Route::get('/dashboard',['uses'=>'Admin\DashboardIndexController@index']);
    Route::get('/dashboard/profile',['uses'=>'Admin\DashboardIndexController@profile']);
    Route::post('/dashboard/update',['uses'=>'Admin\DashboardIndexController@update']);

    Route::get('/dashboard/calendar',['uses'=>'Admin\DashboardCalendarController@index']);
    Route::get('/dashboard/overview',['uses'=>'Admin\DashboardOverviewController@index']);

    Route::get('/dashboard/userslist',['uses'=>'Admin\DashboardUsersController@index']);
    Route::get('/dashboard/user/create',['uses'=>'Admin\DashboardUsersController@create']);
    Route::post('/dashboard/user/store',['uses'=>'Admin\DashboardUsersController@store']);
    Route::get('/dashboard/user/edit/{id}',['uses'=>'Admin\DashboardUsersController@edit']);
    Route::post('/dashboard/user/update',['uses'=>'Admin\DashboardUsersController@update']);
    Route::post('/dashboard/user/delete',['uses'=>'Admin\DashboardUsersController@delete']);

    Route::get('/dashboard/facility',['uses'=>'Admin\DashboardFacilityController@index']);
    Route::get('/dashboard/facility/add',['uses'=>'Admin\DashboardFacilityController@add']);
    Route::post('/dashboard/facility/store',['uses'=>'Admin\DashboardFacilityController@store']);
    Route::get('/dashboard/facility/edit/{id}',['uses'=>'Admin\DashboardFacilityController@edit']);
    Route::get('/dashboard/facility/view/{id}',['uses'=>'Admin\DashboardFacilityController@view']);
    Route::post('/dashboard/facility/update',['uses'=>'Admin\DashboardFacilityController@update']);
    Route::post('/dashboard/facility/delete',['uses'=>'Admin\DashboardFacilityController@delete']);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
