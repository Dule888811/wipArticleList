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
/*Route::get('/loginUser', 'Auth\LoginController@loginUser')->name('loginUser');
Route::post('/login', 'Auth\LoginController@login')->name('login');*/
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/articles/create',[
    'uses' => 'ArticlesController@create',
    'as' => 'articles.create'
]);
/*Route::post('/article/create',[
    'uses' => 'ArticleController@create',
    'as' => 'article.create'
]); 
Route::post('/article/created',[
    'uses' => 'API/ArticleController@store',
    'as' => 'article.store'
]); */
