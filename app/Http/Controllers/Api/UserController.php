<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            // Création de l'utilisateur
            $user = User::create([
                "name" => $request->name,
                "telephone" => $request->telephone,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]);
            // Création d'un token personnel pour l'utilisateur
            $token = $user->createToken($user->name)->plainTextToken;

            // Réponse JSON
            return response()->json([
                'status' => true,
                'message' => 'Inscription réussie',
                'user' => $user,
                'token_type' => 'Bearer',
                "access_token" => $token,
            ]);


        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'error' => $th->getMessage()]);
        }
    }

    public function login(Request $request)
    {
        try {

            // Vérification des informations d'identification
            if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return response()->json(['status' => false, 'message' => 'Les informations de connexion sont incorrectes']);
            }
            $user = Auth::user();
            $token = $user->createToken($user->name)->plainTextToken;
            return response()->json([
                'status' => true,
                'message' => 'Connexion réussie',
                'user' => $user,
                'token_type' => 'Bearer',
                "access_token" => $token,
            ]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'error' => $th->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        try {

            // Récupérer l'utilisateur authentifié
            $user = $request->user();

            // Suppression du token actuel de l'utilisateur
            $user->currentAccessToken()->delete();

            // Réponse JSON
            return response()->json(['status' => true, 'message' => 'Déconnexion réussie']);

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }

    }
}
