<?php

use App\Role;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::resource('/user', 'UserController')->name('index', 'user');
    Route::get('user/export/', 'UserController@export')->name('user.export');;
    Route::post('user/import/', 'UserController@import')->name('user.import');;
    Route::delete('user/DeleteAll', 'UserController@deleteAll')->name('user.deleteAll');
    Route::get('/posts', 'PostController@index')->name('index', 'posts');
    Route::get('/{slug}', 'PostController@show');
    Route::post('/comment', 'PostController@comment');
});
