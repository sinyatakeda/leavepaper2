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

Route::get('/', function() {return view('top');});
Route::get('login', function() {return view('auth/login');});
Route::get('register', function() {return view('auth/register');});
Route::get('index','PostsController@index')->name('top');
Route::resource('posts','PostsController',['only' => ['create','store','show','edit','update','destroy']]);
Route::resource('comments','CommentsController',['only' =>['store']]);
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//入力ページ
Route::get('/contact', 'ContactController@index')->name('contact.index');

//確認ページ
Route::post('/contact/confirm', 'ContactController@confirm')->name('contact.confirm');

//送信完了ページ
Route::post('/contact/thanks', 'ContactController@send')->name('contact.send');
