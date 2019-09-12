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
    return view('addbox');
});

/*
 * 訪客路由
 */
Route::get('guest/logout', function () {})->middleware('logout');

Route::get('/guest/index', 'guestController@get_index');
Route::get('/guest/login', 'guestController@get_login');
Route::post('/guest/login', 'guestController@post_login');
Route::get('/guest/signup', 'guestController@get_signup');
Route::post('/guest/signup', 'guestController@post_signup');
Route::get('/guest/sign', 'guestController@get_sign');

Route::post('/guest/checkAccount','guestController@post_checkAccount');

/*
 * 使用者路由
 */
// Route::get('guest/logout', function () {})->middleware('logout');
Route::get('/user/addbox', 'UserController@get_addbox')->middleware('checkLogin');
Route::post('/user/addbox', 'UserController@post_addbox')->middleware('checkLogin');
Route::get('/user/boxconnection', 'UserController@get_boxconnection')->middleware('checkLogin');


