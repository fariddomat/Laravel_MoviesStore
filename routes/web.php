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

Route::get('/','WelcomeController@index')->name('welcome');


Auth::routes();

Route::group(['middleware'=>'auth'],function(){


});

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/movies/index', 'HomeController@index')->name('movies.index');

Route::resource('movies','MovieController')->only(['index', 'show']);

//search actors
Route::get('/actors/{actor}', 'ActorController@index')->name('actor.index');


// increment_views
Route::post('/movies/{movie}/increment_views', 'MovieController@increment_views')->name('movies.increment_views');

//order_movie
Route::post('/movies/{movie}/order', 'OrderController@index')->name('movies.order');


//toggle_favorite
Route::post('/movies/{movie}/toggle_favorite', 'MovieController@toggle_favorite')->name('movies.toggle_favorite');

//rating
Route::post('/movies/rateMovie', 'MovieController@rateMovie')->name('movies.rateMovie');


//comments
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')
    ->where('provider','facebook|google');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')
    ->where('provider','facebook|google');

