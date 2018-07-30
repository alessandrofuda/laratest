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




// 30/07/2018

//Route::group(['prefix' => 'v1'], function(){

//Route::prefix('v1')->group(function(){



	Route::get('articles', function(){
		return Article::all();
	});


	Route::get('article/{id}', function($id){
		return Article::find($id);
	});


	Route::post('article', function(Request $request){
		return Article::create($request->all());
	});


	Route::put('article/{id}', function(Request $request, $id){

		$article = Article::findOrFail($id);
		$article->update($request->all());

		return $article;
	});


	Route::delete('article/{id}', function($id){
		$article = Article::find($id);
		$article->delete();

		return 204;
	});


// });