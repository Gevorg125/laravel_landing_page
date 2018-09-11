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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware'=>'web'], function() {
    Route::match(['get', 'post'], '/', ['uses' => 'IndexController@execute', 'as'=>'home']);
    Route::get('/page/{alias}', ['uses' => 'PageController@execute', 'as' => 'page']);

    Route::auth();
});


Route::group(['prefix'=>'admin', 'middleware' => 'auth'], function(){

    //admin
    Route::get('/', function(){
        //knkari admini ej@
    });

    //admin/pages
    Route::group(['prefix' => 'pages'], function(){
        Route::get('/', ['uses' => 'PagesController@execute', 'as' => 'pages']);

        //admin/pages/add
        Route::match(['get', 'post'], '/add', ['uses' => 'PagesAddController@execute', 'as'=>'pagesAdd']);

        //admin/pages/edit/{page}
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses' => 'PagesEditController@execute', 'as' => 'pagesEdit']);
    });

    //admin/portfolio
    Route::group(['prefix' => 'portfolios'], function(){
        Route::get('/', ['uses' => 'PortfolioController@execute', 'as' => 'portfolio']);

        //admin/portfolio/add
        Route::match(['get', 'post'], '/add', ['uses' => 'PortfolioAddController@execute', 'as'=>'portfolioAdd']);

        //admin/portfolio/edit/{portfolio}
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', ['uses' => 'PortfolioEditController@execute', 'as' => 'portfolioEdit']);
    });

    //admin/service
    Route::group(['prefix' => 'services'], function(){
        Route::get('/', ['uses' => 'ServiceController@execute', 'as' => 'service']);

        //admin/service/add
        Route::match(['get', 'post'], '/add', ['uses' => 'ServiceAddController@execute', 'as'=>'serviceAdd']);

        //admin/service/edit/{service}
        Route::match(['get', 'post', 'delete'], '/edit/{service}', ['uses' => 'ServiceEditController@execute', 'as' => 'serviceEdit']);
    });
});