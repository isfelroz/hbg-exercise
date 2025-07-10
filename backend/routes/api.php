<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\BaseController;

Route::get('/pilots', function (Request $request) {
    $controller = new PilotController();
    return $controller->index();
});

Route::post('/pilots', function (Request $request) {
    $controller = new PilotController();
    return $controller->store($request);
});

Route::delete('/pilots/{pilot}', function (Pilot $pilot) {
    $controller = new PilotController();
    return $controller->destroy($pilot);
});

Route::get('/bases', function (Request $request) {
    $controller = new BaseController();
    return $controller->index();
});
