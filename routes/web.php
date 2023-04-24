<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [ArticleController::class, 'showAllArticle']);
Route::view('/addArticle', 'pages.addArticle')->middleware(['auth']);
Route::post('/addArticle', [ArticleController::class, 'addArticle'])->middleware(['auth']);
Route::get('/article/{id}', [ArticleController::class, 'showArticleById']);
Route::post('/addComment', [ArticleController::class, 'addComment'])->middleware(['auth']);
Route::get('/profile', [UserController::class, 'showProfile'])->middleware(['auth']);
Route::post('/updateUserData', [UserController::class, 'updateUserData'])->middleware(['auth']);
Route::post('/changeUserAvatar', [UserController::class, 'changeUserAvatar'])->middleware(['auth']);

require __DIR__.'/auth.php';
