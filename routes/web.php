<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () { return view('welcome'); });

/* 
*   2021/5/14
*
*   User Authentication routes
 */
Route::get('/', 'LoginController@login');
Route::get('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');
Route::get('/register', 'LoginController@register');
Route::get('/forgot-password','LoginController@forgot_password');
Route::get('/reset-password','LoginController@reset_password');

Route::post('/login','LoginController@login_post');
Route::post('/register', 'LoginController@register_post');

/* Admin dashboard Routes */
Route::get('dashboard','AdminController@dashboard');

Route::get('token-wallet','AdminController@token_wallet');
Route::get('personal-wallet','AdminController@personal_wallet');

/* Optionals */
Route::post('send-money','AdminController@sendMoneyPerType');
Route::post('receive-fund','AdminController@receiveFund');

Route::post('/rltime-atari-rate','AdminController@real_time_atari_rate');

