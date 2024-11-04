<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Depart;
use Illuminate\Http\Request;

class DepartController extends Controller
{
    public function list()
    {
        try {
            $depart = Depart::all();
            return response()->json([
                "status" => true,
                "message" => "Liste des départs",
                "total" => $depart->count(),
                "data" => $depart,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'error' => $th->getMessage()]);
        }
    }

    public function add(Request $request)
    {
        try {
            $depart = Depart::create(
                [
                    'idDepart' => $request->idDepart,
                    'idDestination' => $request->idDestination,
                    'HeureDepart' => $request->HeureDepart,
                ]
            );
            return response()->json([
                "status" => true,
                "message" => "Depart enregistrée",
                "data" => $depart
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'error' => $th->getMessage()]);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $depart = depart::find($id);

            if (!$depart) {
                return response()->json(['status' => false, "message" => "depart introuvable"]);
            }
            $depart->update($request->all());
            return response()->json(["status" => true, "message" => "depart modifiée", "data" => $depart]);


        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }

    }

    public function delete($id)
    {
        try {
            $depart = Depart::find($id);

            if (!$depart) {
                return response()->json(['status' => false, "message" => "Depart introuvable"]);
            }

            $depart->delete();
            return response()->json(['status' => true, 'message' => "Suppresion réussie"]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }

    }
}
