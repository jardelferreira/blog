<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthorController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('authors',AuthorController::class);

Route::get('authors/{author}/articles',[AuthorController::class,'articles']);

Route::prefix('articles')->group(function(){
    Route::get('/',[ArticleController::class,'index']);
    Route::get('/{article}',[ArticleController::class,'show']);
    Route::get('/{article}/comments',[ArticleController::class,'comments']);
    Route::post('/',[ArticleController::class,'store']);
    Route::post('/{article}/comment',[CommentController::class,'store']);
    Route::put('/{article}',[ArticleController::class,'update']);
    Route::delete('/{article}/author/{author}',[ArticleController::class,'destroy']);

});

Route::prefix('comment')->group(function(){
    Route::get('/{comment}',[CommentController::class,'show']);
    Route::put('/{comment}',[CommentController::class,'update']);
    Route::delete('/{comment}',[CommentController::class,'destroy']);
});

