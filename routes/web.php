<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
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
    return view('homepage');
});

Route::get('/about',function (){
    return view('about');
});

Route::get('/article',[ArticleController::class,"index"])->name('articles.index');
Route::post('/article',[ArticleController::class,"store"]);
Route::get('/article/create',[ArticleController::class,"create"])->name('articles.create');
Route::get('/article/{article}',[ArticleController::class,"show"])->name('articles.show');
Route::get('/article/{article}/edit',[ArticleController::class,"edit"]);
Route::put('/article/{article}',[ArticleController::class,"update"]);






