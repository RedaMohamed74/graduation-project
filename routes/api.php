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

Route::group(['namespace'=>'Api'],function(){

	Route::group(['middleware'=>'auth:api'],function(){

		Route::get('/user', function (Request $request) {
	    return $request->user();
	    });
	    	Route::post('add_pharmcy_favorite','PharamcyController@add_pharmcy_fav');

	    
	});

	Route::get('login','UsersController@login');
	Route::post('register','UsersController@register');
	Route::get('getallplaces','PharamcyController@getallplaces');
	Route::get('getSearch','PharamcyController@getSearch');
    Route::post('add_pharmcy_fav','PharamcyController@add_pharmcy_fav');
	Route::post('pharmcyFavorite','PharamcyController@pharmcyfav');
	Route::get('getPharmcyFavFromSpecificUser','PharamcyController@getPharmcyFavFromSpecificUser');
	Route::get('getallDrugs','DrugsController@getallDrugs');
	Route::post('ratePharamcy','PharamcyController@ratePharamcy');

});