<?php

use App\Http\Controllers\Api\DepartController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\GareController;
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

//Authentification d'un utilisateur
Route::post("register", [UserController::class, 'register']); //incription de l'utilisateur
Route::post("login", [UserController::class, 'login']); //connexion de l'utilisateur

Route::middleware('auth:sanctum')->group(function () {
    //return $request->user();
    Route::post("logout", [UserController::class, 'logout']); //deconnexion de l'utilisateur
    Route::delete("deleteUser", [UserController::class, 'deleteUser']); //supprimer de l'utilisateur

});

//Actions sur la gare
Route::prefix('gare')->group(function () {
    Route::get('list', [GareController::class, 'list']);
    Route::post('add', [GareController::class, 'add']);
    Route::put('edit/{id}', [GareController::class, 'edit']);
    Route::delete('delete/{id}', [GareController::class, 'delete']);
});

//Actions sur les destinations
Route::prefix('destination')->group(function () {
    Route::get('list', [DestinationController::class, 'list']);
    Route::post('add', [DestinationController::class, 'add']);
    Route::put('edit/{id}', [DestinationController::class, 'edit']);
    Route::delete('delete/{id}', [DestinationController::class, 'delete']);
});

//Actions sur les départs
Route::prefix('depart')->group(function () {
    Route::get('list', [DepartController::class, 'list']);
    Route::post('add', [DepartController::class, 'add']);
    Route::put('edit/{id}', [DepartController::class, 'edit']);
    Route::delete('delete/{id}', [DepartController::class, 'delete']);
});




