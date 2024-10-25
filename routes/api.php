<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Authentification d'un utilisateur
Route::post("register", [UserController::class, 'register']); //incription de l'utilisateur
Route::post("login", [UserController::class, 'login']); //connexion de l'utilisateur
Route::post("logout", [UserController::class, 'logout'])->middleware('auth:sanctum'); //deconnexion de l'utilisateur


