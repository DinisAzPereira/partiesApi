<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\JwtMiddleware;
//use App\Http\Controllers\GalacticAuthController;


Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('me', [UserController::class, 'me']);


//Route::middleware([JwtMiddleware::class])->group(function () {
  //  Route::get("crew-members", [GalacticAuthController::class, 'gatherCrewMembers']);
    //Route::patch("abort-mission", [GalacticAuthController::class, 'abortMission']);
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
