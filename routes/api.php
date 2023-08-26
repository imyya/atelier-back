<?php

use App\Models\Category;
use App\Models\Fournisseur;
use App\Models\ArticleVente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ArticleVenteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/categories/store',[CategoryController::class,'store']);
Route::get('/categories/show',[CategoryController::class,'index']);
Route::get('/categories/all',[CategoryController::class,'all']);
Route::put('/categories/update/{id}',[CategoryController::class,'update']);
Route::get('/categories/find',[CategoryController::class,'find']);
Route::delete('/categories/delete',[CategoryController::class,'delete']);
Route::post('/articles/store',[ArticleController::class,'store']);
Route::get('/articles',[ArticleController::class,'all']);
Route::get('/fournisseurs/all',[FournisseurController::class,'index']);
Route::delete('/articles/delete/{id}',[ArticleController::class,'delete']);
Route::put('/articles/{id}',[ArticleController::class,'update']);
Route::get('/articlesvente',[ArticleVenteController::class,'index']);
Route::post('/articlesvente/store',[ArticleVenteController::class,'store']);
Route::delete('/articlesvente/{id}',[ArticleVenteController::class,'delete']);
Route::put('/articlesvente/{id}',[ArticleVenteController::class,'update']);



