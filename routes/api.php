<?php

use App\Http\Controllers\Club\ClubController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\EventParticipantController;
use App\Http\Controllers\Inscription\InscriptionController;
use App\Http\Controllers\Meeting\MeetingController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/* Api routes
to see the list of routes
php artisan route:list
*/
Route::apiResource('Users', UserController::class)->only([
    'index', 'show'
]);;
Route::apiResource('Events', EventController::class)->only([
    'index', 'show'
]);;
Route::apiResource('Clubs', ClubController::class)->only([
    'index', 'show'
]);;
Route::apiResource('EventParticipants', EventParticipantController::class)->only([
    'index', 'show'
]);;
Route::apiResource('Inscriptions', InscriptionController::class)->only([
    'index', 'show'
]);;
Route::apiResource('Meetings', MeetingController::class)->only([
    'index', 'show'
]);;
