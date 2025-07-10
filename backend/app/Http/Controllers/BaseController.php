<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Base;

class BaseController extends Controller
{
    public function index()
    {
        $bases = Base::all();
        return response()->json($bases);
    }
}
