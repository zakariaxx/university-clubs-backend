<?php

use App\Http\Controllers\Club\ClubController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\EventParticipantController;
use App\Http\Controllers\Inscription\InscriptionController;
use App\Http\Controllers\Meeting\MeetingController;
use App\Http\Controllers\User\AuthController;
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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
});


/* Api routes
to see the list of routes
php artisan route:list
*/
Route::apiResource('users', UserController::class)->only([
    'index', 'show'
]);
Route::apiResource('events', EventController::class)->only([
    'index', 'show'
]);
Route::apiResource('clubs', ClubController::class)->only([
    'index', 'show'
]);
Route::apiResource('eventparticipants', EventParticipantController::class)->only([
    'index', 'show'
]);
Route::apiResource('inscriptions', InscriptionController::class)->only([
    'index', 'show'
]);;
Route::apiResource('meetings', MeetingController::class)->only([
    'index', 'show'
]);

// get random list of users
Route::get('club/randomlist', [ClubController::class, 'getRandomUsers']);


// Token validation
Route::get('user/verify/{token}', 'App\Http\Controllers\AuthController@verifyUser')->name('verify');
