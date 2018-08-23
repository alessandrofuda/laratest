<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//}); 




// VUE SPA exercise
Route::get('/{any}', 'SpaController@index')->where('any', '.*');
 






//  API RESOURCES
use App\User;
use App\Http\Resources\User as UserResource;

Route::get('/user', function () {

    $collection = User::all(); //User::whereIn('id',[1,2])->get();  // User::find(1);
    // dd($collection);
    // dd(new UserResource($collection));
    return UserResource::collection($collection);  // new
});



use App\Http\Resources\UserCollection;

Route::get('/user-coll', function () {

    $collection = User::all(); 
    return new UserCollection($collection); 
});





/**
* /posts --> restituisce la lista di tutti i posts in db
* Post::with('author')  --> recupera tutti i post con le info di ogni author (dall'altra tabella 
* collegata attraverso la foreign key)
*
*/

/*Route::get('/', function() {
	$posts = App\Post::with('author.profile')->get();

	
	//dump($authors[0]->posts()->title);
	//dump($authors[0]->author->profile->city);


	return view('blog.home')->with('posts', $posts); //ritorno la view passando $posts come variabile

});*/

/**
* /post/{id}  --> restituisce un singolo post con id numero...
* ritorna la view passando $post come variabile
* $post è estratto con la funzione findOrFail()
* (Fail: in caso di errore restituisce 404 error standard page)
*
*/



// BROADCAST with PUSHER
// https://code.tutsplus.com/tutorials/how-laravel-broadcasting-works--cms-30500
Route::get('message/index', 'MessageController@index');
Route::get('message/send', 'MessageController@send');
Route::get('sending-page', ['as'=>'sending-page', 'uses' => 'MessageController@sending_page']);





// Realtime calculator with Vuejs
Route::get('/', function(){
    return view('index');
});







/*
Route::get('post/{id}', function ($id) {
	$post = App\Post::findOrFail($id);  
	return view('blog.post')->with('post', $post);
});
Auth::routes();

Route::get('/home', 'HomeController@index');


// mostra i piani tariffari impostati da dashboard braintree e sincronizzati in db (tab: 'plans')
Route::get('/plans', 'PlansController@index');

// pagine con subscription - una per ogni piano tariffario (only authenticated users)

Route::group(['middleware' => 'auth'], function () {
    Route::get('/plan/{plan}', 'PlansController@show');  // {plan} = basic, middle, premium
    Route::get('/braintree/token', 'BraintreeTokenController@token');
    Route::post('/subscribe', 'SubscriptionsController@store');

    Route::group(['middleware' => 'subscribed'], function () {
    	Route::get('/lessons', 'LessonsController@index');
    	Route::get('/subscriptions', 'SubscriptionsController@index');
    	Route::post('/subscription/cancel', 'SubscriptionsController@cancel');
    	Route::post('/subscription/resume', 'SubscriptionsController@resume');

		Route::group(['middleware' => 'premium-subscribed'], function () {
        	Route::get('/prolessons', 'LessonsController@premium');
    	});


    });

    
});

// webhooks --> ricevono notifiche from braintree
Route::post('braintree/webhooks', '\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/
