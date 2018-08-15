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


// Route::get('/', function () {
//     return view('index');
// });

//Auth::routes();
Route::get('/', 'HomeController@getIndex')->name('index');
Route::get('/home', 'HomeController@gethome')->name('home');
Route::post('/login', 'UsersController@postSignIn')->name('login');
Route::post('/signup',[
    'uses'=> 'UsersController@signup',
    'as'=>'signup'
]);
Route::get('/logout', 'UsersController@getLogout')->name('logout');
Route::post('/addPharamcy', 'HomeController@addPharamcy')->name('addPharamcy');
Route::post('/addDrugs', 'HomeController@addDrugs')->name('addDrugs');
Route::post('/addQuantity', 'HomeController@addQuantity')->name('addQuantity');
Route::get('/search', 'HomeController@Search')->name('search');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/addBill', 'HomeController@addBill')->name('addBill');
Route::get('/result', 'HomeController@result')->name('result');
Route::get('/getinfoph', 'HomeController@getinfoph')->name('getinfoph');
Route::get('/getBills', 'HomeController@getBills')->name('getBills');
Route::get('/bills', 'HomeController@bills')->name('bills');

// Route::get('getinfoph', function () {
//     return view('pages.getinfoph');
// })->name('getinfoph');