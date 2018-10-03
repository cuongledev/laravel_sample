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

Route::group(['prefix'=> 'admin','as' => 'admin.','namespace' => 'Backend'],function(){
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

    // product

    Route::get('/products', 'ProductController@index')->name('product.index');
    Route::get('/products/create', 'ProductController@create')->name('product.create');
    Route::post('/products', 'ProductController@store')->name('product.store');
    Route::get('/products/{id}', 'ProductController@show')->where('id', '[0-9]+')->name('product.show');
    Route::put('/products/{id}/update', 'ProductController@update')->name('product.update');
    Route::delete('/products/{id}/delete', 'ProductController@delete')->name('product.delete');

});

Route::group(['as' => 'frontend.','namespace' => 'Frontend'],function(){
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/products/{slug}-{id}.html', 'HomeController@show')->name('home.show')
    ->where([
        'slug' => '[a-zA-Z0-9-]+',
        'id' => '[0-9]+'
    ]);

});