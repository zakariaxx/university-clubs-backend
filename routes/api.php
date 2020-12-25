<?php

use App\Http\Controllers\Budget\BudgetController;
use App\Http\Controllers\Club\ClubController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\EventParticipantController;
use App\Http\Controllers\Inscription\InscriptionController;
use App\Http\Controllers\Meeting\MeetingController;
use App\Http\Controllers\SimpleQRcodeController;
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

    //Authentication routes
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::apiResource('users', UserController::class)->only([
        'index', 'show','update','destroy'
    ]);

    Route::apiResource('events', EventController::class)->only([
        'update','destroy','store'
    ]);



});


    Route::group([
        'middleware' => 'auth:api'
    ], function() {

        Route::apiResource('users', UserController::class)->only([
            'index', 'show','update','destroy'
        ]);

        Route::apiResource('events', EventController::class)->only([
            'update','destroy','store'
        ]);

        Route::apiResource('clubs', ClubController::class)->only([
            'update','destroy','store'
        ]);


        Route::apiResource('eventparticipants', EventParticipantController::class)->only([
            'index', 'show','update','destroy','store'
        ]);

        Route::apiResource('inscriptions', InscriptionController::class)->only([
            'index','destroy','store'
        ]);

        Route::apiResource('meetings', MeetingController::class)->only([
            'index','update','destroy','store'
        ]);

        Route::apiResource('budgets', MeetingController::class)->only([
            'index','update','destroy','store'
        ]);
});


/* Api routes
to see the list of routes
php artisan route:list
*/

    //Clubs group
    Route::group([
        'prefix' => 'clubs'
    ], function () {

        Route::get('getAllClubs', [ClubController::class, 'index']);
        Route::get('randomlist', [ClubController::class, 'getRandomUsers']);

    });


    //event group
    Route::group([
        'prefix' => 'events'
    ], function () {

        Route::get('getAllEvents', [EventController::class, 'index']);
        Route::get('getLast', [EventController::class, 'getTreeLast']);
        Route::put('uploadEventImage/{id}', [EventController::class, 'uploadEventImage']);

    });

// QR code
    Route::get("simple-qrcode", [SimpleQRcodeController::class,'generate']);



    //users group
    Route::group([
        'prefix' => 'users'
    ], function () {

        Route::get('verify/{token}',[AuthController::class, 'verifyUser'])->name('verify');

    });


