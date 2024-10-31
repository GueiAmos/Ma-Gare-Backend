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

Route::middleware('auth:sanctum')->group(function () {
    //return $request->user();
    Route::post("logout", [UserController::class, 'logout']); //deconnexion de l'utilisateur
    Route::delete("deleteUser", [UserController::class, 'deleteUser']); //supprimer de l'utilisateur
});

//Authentification d'un utilisateur
Route::post("register", [UserController::class, 'register']); //incription de l'utilisateur
Route::post("login", [UserController::class, 'login']); //connexion de l'utilisateur


