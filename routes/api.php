<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartyController;
use App\Http\Middleware\JwtMiddleware;
//use App\Http\Controllers\GalacticAuthController;


// Routes de user Controller
Route::post('/users/register', [UserController::class, 'register']);
Route::post('/users/login', [UserController::class, 'login']);
Route::get('/users/profile', [UserController::class, 'me']);


//Route de party Controller

Route::get("/parties", [PartyController::class, 'index']);
Route::post("/parties", [PartyController::class, 'store']);
Route::get("/parties/{id}", [PartyController::class, 'show']);
Route::delete("/parties/{id}", [PartyController::class, 'destroy']);

//Route::middleware([JwtMiddleware::class])->group(function () {
  //  Route::get("crew-members", [GalacticAuthController::class, 'gatherCrewMembers']);
    //Route::patch("abort-mission", [GalacticAuthController::class, 'abortMission']);
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
