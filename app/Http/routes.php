<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('/uppercase/{uppercase}','HomeController@upperCase');

Route::get('/lowercase/{lowercase}','HomeController@lowerCase');


Route::get('/increment/{hey}', 'HomeController@increment');

Route::get('/rolldice',function(){

	return view('roll-dice'); 
});
Route::get('/rolldice/{huh}',function($guess){
	$data = array('guess' => $guess);
	return view('roll-dice')->with($data); 
});

Route::resource('posts', 'PostsController');




