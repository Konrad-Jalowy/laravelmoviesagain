<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
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
Route::post('/search', SearchController::class )->name('search');
Route::get('/profile', ProfileController::class )->name('profile');
Route::get('roles/select', [RoleController::class, 'selectUserAndRole'])->name('selectRole');
Route::get('roles/manage', [RoleController::class, 'managePrivlidges'])->name('roles.manage');
Route::post('roles/manage', [RoleController::class, 'setPrivlidges'])->name('roles.set');
Route::post('roles/select', [RoleController::class, 'joinUserAndRole'])->name('joinRole');
Route::get('roles/split', [RoleController::class, 'selectAndRemove'])->name('selectSplit');
Route::post('roles/split', [RoleController::class, 'splitUserAndRole'])->name('splitRole');
Route::get('actors/select', [ActorController::class, 'selectAndJoin'])->name('selectMovie');
Route::post('actors/select', [ActorController::class, 'join'])->name('joinMovie');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class);
Route::resource('articles', ArticleController::class);
Route::get('articles/{article}/addtag', [ArticleController::class, 'addTag'])->name('addtag');
Route::post('articles/{article}/addtag', [ArticleController::class, 'joinTag'])->name('jointag');
Route::get('articles/{article}/createanswer', [ArticleController::class, 'createAnswer'])->name('answercreate');
Route::post('articles/{article}/createanswer', [ArticleController::class, 'storeAnswer'])->name('answerstore');
Route::resource('tags', TagController::class);
Route::resource('categories', CategoryController::class);
Route::resource('directors', DirectorController::class);
Route::resource('movies', MovieController::class);
Route::resource('actors', ActorController::class);
Route::resource('uploads', UploadController::class);
Route::get('roles/{role}/adduser', [RoleController::class, 'addUserToRole'])->name('addusertorole');
Route::post('roles/{role}/adduser', [RoleController::class, 'joinUser'])->name('joinuser');



