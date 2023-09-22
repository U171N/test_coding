<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/activity','AdminController@show')->name('activity.show');

Route::get('/add/activity', 'AdminController@tambah')->name('add.activity');
Route::post('/add/activity', 'AdminController@store');


Route::get('/activity/edit/{id}', 'AdminController@EditActivity')->name('activity.edit');
Route::put('/activity/update/{id}', 'AdminController@UpdateActivity')->name('activity.update');
Route::get('/admin/kategori/delete/{id}', 'AdminController@Delete')->name('activity.delete');
Route::get('/instruktur/logout', 'AdminController@keluar')->name('instruktur.logout');


Route::get('/daftar/activity','SiswaController@Dashboard')->name('dashboard.siswa');
Route::get('/siswa/logout', 'SiswaController@keluar')->name('siswa.logout');
