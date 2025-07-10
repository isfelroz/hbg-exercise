<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PilotController;

Route::get('/pilots', function (Request $request) {
    $controller = new PilotController();
    return $controller->index();
});
