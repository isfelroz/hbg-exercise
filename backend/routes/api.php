<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\BaseController;

Route::get('/pilots', function (Request $request) {
    $controller = new PilotController();
    return $controller->index();
});

Route::get('/bases', function (Request $request) {
    $controller = new BaseController();
    return $controller->index();
});
