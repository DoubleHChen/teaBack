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

Route::get('/', function () {
    return view('welcome');
});
Route::get(('/login'),'Admin\TestController@login');
Route::get(('/tea'),'Admin\TestController@tea');
Route::get(('/register'),'Admin\TestController@register');
Route::get(('/user'),'Admin\TestController@user');
Route::get(('/deleteUser'),'Admin\TestController@deleteUser');
Route::get(('/updateUser'),'Admin\TestController@updateUser');
Route::get(('/deleteCommodity'),'Admin\TestController@deleteCommodity');
Route::get(('/updateCommodity'),'Admin\TestController@updateCommodity');

Route::get(('/commodity'),'Admin\TestController@commodity');
Route::get(('/indent'),'Admin\TestController@indent');
Route::get(('/getIndent'),'Admin\TestController@getIndent');

