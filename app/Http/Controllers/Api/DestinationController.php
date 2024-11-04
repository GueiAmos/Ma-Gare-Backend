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
                "data" => $destination->orderBy("created_at", 'desc')->get(),
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
                    'NomDesination' => $request->idDestination,
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

}
