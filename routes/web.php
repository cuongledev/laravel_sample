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

Route::get('/home', function(){
    return view('welcome');
})->name('home');
Route::group(['prefix'=> 'admin','as' => 'admin.'],function(){
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/users/create', 'UserController@create')->name('user.create');
    Route::post('/users', 'UserController@store')->name('user.store');
    Route::get('/users/{id}', 'UserController@show')->where('id', '[0-9]+')->name('user.show');
    Route::put('/users/{id}/update', 'UserController@update')->name('user.update');
    Route::delete('/users/{id}/delete', 'UserController@delete')->name('user.delete');

    // category

    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::get('/categories/create', 'CategoryController@create')->name('category.create');
    Route::post('/categories', 'CategoryController@store')->name('category.store');
    Route::get('/categories/{id}', 'CategoryController@show')->where('id', '[0-9]+')->name('category.show');
    Route::put('/categories/{id}/update', 'CategoryController@update')->name('category.update');
    Route::delete('/categories/{id}/delete', 'CategoryController@delete')->name('category.delete');

});