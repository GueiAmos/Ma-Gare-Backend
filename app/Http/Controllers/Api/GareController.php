<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gare;
use Illuminate\Http\Request;

class GareController extends Controller
{
    public function list()
    {
        try {
            $gare = Gare::all();
            return response()->json([
                "status" => true,
                "message" => "Liste des gares",
                "total" => $gare->count(),
                "data" => $gare,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'error' => $th->getMessage()]);
        }
    }

    public function add(Request $request)
    {
        try {
            $gare = Gare::create(
                [
                    'NomGare' => $request->NomGare,
                    'AdresseGare' => $request->AdresseGare,
                    'ContactGare' => $request->ContactGare,
                ]
            );
            return response()->json([
                "status" => true,
                "message" => "Gare enregistrée",
                "data" => $gare
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'error' => $th->getMessage()]);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $gare = Gare::find($id);

            if (!$gare) {
                return response()->json(['status' => false, "message" => "Gare introuvable"]);
            }
            $gare->update($request->all());
            return response()->json(["status" => true, "message" => "Gare modifiée", "data" => $gare]);


        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }

    }

    public function delete($id)
    {
        try {
            $gare = gare::find($id);

            if (!$gare) {
                return response()->json(['status' => false, "message" => "Gare introuvable"]);
            }

            $gare->delete();
            return response()->json(['status' => true, 'message' => "Suppresion réussie"]);
            
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }

    }
}
