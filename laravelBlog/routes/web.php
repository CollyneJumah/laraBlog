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
//     return view('welcome');
// });

// Route::get('/services', function () {
//   return view('pages.services');
// });


//for dynamic routing i.e using id

Route::get('/','PagesControllers@index');
Route::get('/about','PagesControllers@about');
Route::get('/services','PagesControllers@services');
Route::resource('posts','PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
