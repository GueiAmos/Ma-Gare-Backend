<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function list()
    {
        try {
            $destination = Destination::all();
            return response()->json([
                "status" => true,
                "message" => "Liste des destinations",
                "total" => $destination->count(),
                "data" => $destination,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'error' => $th->getMessage()]);
        }
    }

    public function add(Request $request)
    {
        try {
            $destination = Destination::create(
                [
                    'idDestination' => $request->idDestination,
                    'NomDestination' => $request->NomDestination,
                    'PrixDestination' => $request->PrixDestination,
                    'idGare' => $request->idGare,
                ]
            );
            return response()->json([
                "status" => true,
                "message" => "Destination enregistrée",
                "data" => $destination
            ]);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'error' => $th->getMessage()]);
        }
    }

    public function edit(Request $request, $id)
    {
        try {
            $destination = destination::find($id);

            if (!$destination) {
                return response()->json(['status' => false, "message" => "destination introuvable"]);
            }
            $destination->update($request->all());
            return response()->json(["status" => true, "message" => "destination modifiée", "data" => $destination]);


        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }

    }

    public function delete($id)
    {
        try {
            $destination = Destination::find($id);

            if (!$destination) {
                return response()->json(['status' => false, "message" => "Destination introuvable"]);
            }

            $destination->delete();
            return response()->json(['status' => true, 'message' => "Suppresion réussie"]);

        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => $th->getMessage()]);
        }

    }

}
