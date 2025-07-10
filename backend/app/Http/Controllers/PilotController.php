<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pilot;
use App\Models\Base;

class PilotController extends Controller
{
    public function index()
    {
        $pilots = Pilot::with('base')->paginate(10);
        return response()->json($pilots);
    }
}
