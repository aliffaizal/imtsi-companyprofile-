<?php

use App\Http\Controllers\Admin\ArtikelController;
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

Route::get('/', 'HomeController@index')->name('home');
Route::get('register', 'Auth\RegisterController@create');

Route::view('profil', 'pages.profil');
Route::view('kegiatan', 'pages.kegiatan');
Route::post('register', 'Auth\RegisterController@register');

Route::prefix('admin')
->namespace('Admin')
->middleware(['auth', 'admin'])
->group(function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('artikel', 'ArtikelController');
});

Auth::routes(['verify' => true]);

    