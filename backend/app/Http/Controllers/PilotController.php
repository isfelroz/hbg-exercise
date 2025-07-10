<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pilot;
use App\Models\Base;

class PilotController extends Controller
{
    public function index()
    {
        $pilots = Pilot::with('base')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        return response()->json($pilots);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'base_id' => 'required|exists:bases,id'
        ]);

        $pilot = Pilot::create($validated);
        return response()->json(['message' => 'Le pilot a été créé', 'pilot' => $pilot]);
    }

    public function destroy(Pilot $pilot)
    {
        $pilot->delete();
        return response()->json(['message' => 'Pilote supprimé avec succès']);
    }
}
