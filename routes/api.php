<?php

use Illuminate\Http\Request;
use App\Article;

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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');



// https://www.toptal.com/laravel/restful-laravel-api-tutorial


// 30/07/2018
//Route::middleware('auth:api')
//     ->get('/user', function (Request $request) {
//        return $request->user();
// 	 });



//Route::group(['prefix' => 'v1'], function(){
//Route::prefix('v1')->group(function(){
 
Route::group(['middleware' => 'auth:api'], function() {
	Route::get('articles', 'ArticleController@index');
	Route::get('article/{article}', 'ArticleController@show');
	Route::post('article', 'ArticleController@store');
	Route::put('article/{article}', 'ArticleController@update');
	Route::delete('article/{article}', 'ArticleController@delete');
});

	Route::post('register', 'Auth\RegisterController@register');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout');



// });


// API Cruds
Route::resource('/cruds', 'CrudsController', [
											'except' => ['edit', 'show', 'store']
											]);