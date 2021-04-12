<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<<<<<<< HEAD
Route::get('/phongban','PhongBan\PhongbanController@index');
Route::get('/phongban/them','Phongban\PhongbanController@getThem');
Route::post('/phongban/them','Phongban\PhongbanController@postThem');
Route::get('/phongban/xoa/{id}','Phongban\PhongbanController@delete');
Route::get('/phongban/sua/{id}','Phongban\PhongbanController@getSua');
Route::post('/phongban/sua/{id}','Phongban\PhongbanController@postSua');

=======
Route::get('nhansu', 'Quanly\QuanlyNhansuController@index')->name('nhansuIndex');
Route::get('nhansu/create', 'Quanly\QuanlyNhansuController@create')->name('nhansuCreate');
Route::post('nhansu/create', 'Quanly\QuanlyNhansuController@store')->name('nhansuStore');
Route::get('nhansu/{id}/edit', 'Quanly\QuanlyNhansuController@edit')->name('nhansuEdit');
Route::post('nhansu/update/{id}', 'Quanly\QuanlyNhansuController@update')->name('nhansuUpdate');
Route::get('nhansu/{id}/delete', 'Quanly\QuanlyNhansuController@destroy')->name('nhansuDelete'); 
>>>>>>> origin/nhansu
