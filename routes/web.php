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



//Route::group(['middleware'=>'web'], function(){
Route::group([],function(){

    Route::match(['get'],'/',['uses'=>'IndexController@index']);
    Route::post('/change_email',['uses'=>'IndexController@changeEmail']);
    $this->get('logout', 'Auth\LoginController@logout')->name('logout');


    //Route::get('/page/{alias}',['uses'=>'PageController@execute','as'=>'page']);


/*    Route::get('faq',['uses'=>'IndexController@faq']);
    Route::get('affiliate_program',['uses'=>'IndexController@affiliateProgram']);
    Route::get('portfolio',['uses'=>'IndexController@portfolio']);
    Route::get('portfolio',['uses'=>'IndexController@portfolio']);
    Route::get('blog',['uses'=>'BlogController@index']);
    Route::get('blog/page/{page}',['uses'=>'BlogController@index']);
    Route::get('blog/view/{urls}',['uses'=>'BlogController@view']);
    Route::post('send',['uses'=>'IndexController@sendMain']);
    Route::get('search',['uses'=>'SearchController@index']);*/
/*    Route::get('search/', function (Request $request) {
        ['uses'=>'SearchController@index'];
    });*/

    Route::auth();
});

Route::group(['middleware'=>'auth'], function(){


    Route::get('/dashboard',['uses'=>'Admin\DashboardIndexController@index']);
    Route::get('/dashboard/calendar',['uses'=>'Admin\DashboardCalendarController@index']);
    Route::get('/dashboard/overview',['uses'=>'Admin\DashboardOverviewController@index']);
    Route::get('/dashboard/userslist',['uses'=>'Admin\DashboardUsersController@index']);
    Route::match(['get','post'],'/dashboard/user/add',['uses'=>'Admin\DashboardUsersController@add']);
    Route::get('/dashboard/user/edit/{id}',['uses'=>'Admin\DashboardUsersController@edit']);
    Route::post('/dashboard/user/update',['uses'=>'Admin\DashboardUsersController@update']);
    Route::post('/dashboard/user/delete',['uses'=>'Admin\DashboardUsersController@delete']);

/*    Route::get('/',function(){
        if(auth()){
            return  $redirectTo = '/';
        }
    });
    Route::get('/',['uses'=>'PageController@index']);*/

/*    Route::group(['prefix'=>'pages'],function(){
        Route::get('/',['uses'=>'PagesController@execute','as'=>'pages']);
        Route::match(['get','post'],'/add',['uses'=>'PagesAddController@execute','as'=>'pagesAdd']);

        Route::match(['get','post','delete'],'/edit/{page}',['uses'=>'PagesEditController@execute','as'=>'pagesEdit']);
    });

    Route::group(['prefix'=>'portfolios'],function(){
        Route::get('/',['uses'=>'PortfoliosController@execute','as'=>'portfolio']);
        Route::match(['get','post'],'/add',['uses'=>'PortfolioAddController@execute','as'=>'portfolioAdd']);

        Route::match(['get','post','delete'],'/edit/{portfolio}',['uses'=>'PortfolioEditController@execute','as'=>'portfolioEdit']);
    });

    Route::group(['prefix'=>'servises'],function(){
        Route::get('/',['uses'=>'ServiseController@execute','as'=>'servises']);
        Route::match(['get','post'],'/add',['uses'=>'ServiseAddController@execute','as'=>'serviseAdd']);

        Route::match(['get','post','delete'],'/edit/{servise}',['uses'=>'ServiseEditController@execute','as'=>'serviseEdit']);
    });*/


});














Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
