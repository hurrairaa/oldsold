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

// Route::get('/inde', function () {
//     return view('welcome');
// });
Route::get('/help', 'AddController@index');
Route::get('/admin','AdminController@index')->middleware('admin');
Route::post('/favourite','Favorite@store')->name('favourite');
Route::post('/AddPic','AddPicController@upload');
Route::delete('/add/destroy/{id}','AddController@delete');
Route::post('/add/edit/{id}','AddController@edit');
Route::patch('/add/update/{id}','AddController@update');

Route::get('/Adds/index','AddController@index');
Route::post('/upload','AddController@upload');
Route::get('/show/{id}','AddController@show');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/','AddController@index');
Route::get('mylogout',function(){
    Auth::logout();
    url('/index');
});

Auth::routes();
