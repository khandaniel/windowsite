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


Route::get('/test', function () {
    class CBack {

    }
    $callback = new CBack();
    $callback->id = 0;
    $callback->phone_number = '839128390128';
    $callback->name = 'Name';
    $callback->email = 'Name@f.co';
    $callback->email = 'Name@f.co';
    $callback->textorcall = 'TEXT';
    $callback->message = 'Message';
    return view('emails.callback', ['callback' => $callback]);
});

Route::get('/portfolio/{id?}', 'IndexController@portfolio');

Route::get('/callback/processed/{id}', 'IndexController@processCallback')->middleware('auth');

Route::get('/contact', 'IndexController@contact')->name('contact');

Route::post('/contact', 'IndexController@addCallback');

Route::get('/about', 'IndexController@about');

Route::get('/', 'IndexController@index');

Route::get('/articles/{slug?}', 'IndexController@article');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
