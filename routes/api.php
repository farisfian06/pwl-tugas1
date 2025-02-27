<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/articles', [ArticleController::class, 'index']); 
Route::get('/articles/{id}', [ArticleController::class, 'detail']); 
Route::post('/articles', [ArticleController::class, 'add']); 
Route::put('/articles/{id}', [ArticleController::class, 'update']); 
Route::delete('/articles/{id}', [ArticleController::class, 'delete']); 
Route::delete('/comments/{id}', [CommentController::class, 'delete']); 
Route::post('/articles/{articleId}/comments', [CommentController::class, 'add']);