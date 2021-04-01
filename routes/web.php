<?php

use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\Category;
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

Route::get('/', 'ArticleController@index');
Route::post('/store', 'ArticleController@store');
Route::get('/delete/{id}', 'ArticleController@destroy');
Route::get('/edit/{id}', 'ArticleController@edit');
Route::post('/update/{id}', 'ArticleController@update');

