<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DirectorController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class);
Route::resource('articles', ArticleController::class);
Route::get('articles/{article}/addtag', [ArticleController::class, 'addTag'])->name('addtag');
Route::post('articles/{article}/addtag', [ArticleController::class, 'joinTag'])->name('jointag');
Route::resource('tags', TagController::class);
Route::resource('categories', CategoryController::class);
Route::resource('directors', DirectorController::class);
Route::get('roles/{role}/adduser', [RoleController::class, 'addUserToRole'])->name('addusertorole');
Route::post('roles/{role}/adduser', [RoleController::class, 'joinUser'])->name('joinuser');

