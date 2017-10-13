<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Use App\Facility;

// Route::group(['middleware' => 'auth:api'], function() {
    Route::get('users', 'Api\UsersController@index');
    Route::get('users/{user}', 'Api\UsersController@show');
    Route::get('users/type/{usertype}', 'Api\UsersController@getbytype');
    Route::post('users', 'Api\UsersController@store');
    Route::put('users/{user}', 'Api\UsersController@update');
    Route::delete('users/{user}', 'Api\UsersController@delete');

    Route::get('facilities', 'Api\FacilityController@index');
    Route::get('facilities/{facility}', 'Api\FacilityController@show');
    Route::post('facilities', 'Api\FacilityController@store');
    Route::put('facilities/{facility}', 'Api\FacilityController@update');
    Route::delete('facilities/{facility}', 'Api\FacilityController@delete');
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
