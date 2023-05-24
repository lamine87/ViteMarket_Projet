<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Back\ArticleController;
use App\Http\Controllers\Front\GetArticleController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('interface');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [GetArticleController::class, 'index'])->name('article.index');
Route::get('/dashboard', [GetArticleController::class, 'getDashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/detail/{id}', [GetArticleController::class, 'detail'])->name('article.detail');
Route::get('/map', [GetArticleController::class, 'localisation'])->name('google.map');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/create/article', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/edit/{id}', [ArticleController::class, 'getEdit'])->name('getArticle.edit');
    Route::patch('/edit/article/{id}', [ArticleController::class, 'updateArticle'])->name('article.edit');
    Route::delete('/destroy/article/{id}', [ArticleController::class, 'destroyArticle'])->name('article.destroy');


});

// Auth::routes(['verify'=>true]);
Auth::routes(['verify' => true]);

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
