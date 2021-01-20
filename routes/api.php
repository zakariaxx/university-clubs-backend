<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Budget\BudgetController;
use App\Http\Controllers\Club\ClubController;
use App\Http\Controllers\ClubEvaluation\ClubEvaluationController;
use App\Http\Controllers\ClubMember\ClubMemberController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Event\EventParticipantController;
use App\Http\Controllers\File\FileController;
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
    Route::apiResource('clubs', ClubController::class)->only([
        'update', 'destroy', 'store'
    ]);
    //Authentication routes
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('uploadUserImage/{id}', [UserController::class, 'uploadUserImage']);
});


Route::group([
    'middleware' => 'auth:api'
], function () {

    Route::apiResource('events', EventController::class)->only([
        'update','destroy','store'
    ]);



});


    Route::group([
        'middleware' => 'auth:api'
    ], function() {

        Route::get('user-profile',[AuthController::class, 'user']);
        Route::put('profilUpdate/{id}',[UserController::class, 'update']);



    Route::get('user-profile', [AuthController::class, 'user']);
    Route::put('profilUpdate/{id}', [UserController::class, 'update']);

    Route::apiResource('events', EventController::class)->only([
        'update', 'destroy', 'store'
    ]);




    Route::apiResource('eventparticipants', EventParticipantController::class)->only([
        'index', 'show', 'update', 'destroy', 'store'
    ]);

    Route::apiResource('inscriptions', InscriptionController::class)->only([
        'index', 'destroy', 'store'
    ]);

    Route::apiResource('meetings', MeetingController::class)->only([
        'index', 'update', 'destroy', 'store'
    ]);

    Route::apiResource('budgets', MeetingController::class)->only([
        'index', 'update', 'destroy', 'store'
    ]);
});

Route::apiResource('ClubMember', ClubMemberController::class)->only([
    'index'
]);

Route::apiResource('Admin', AdminController::class)->only([
    'index'
]);

/* Api routes
to see the list of routes
php artisan route:list
*/

Route::apiResource('users', UserController::class)->only([
    'index', 'show', 'update', 'destroy'
]);

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

    Route::get('getCurrentEvent', [EventController::class, 'getCurrentEvent']);
    Route::get('getAllEvents', [EventController::class, 'index']);
    Route::get('getLast', [EventController::class, 'getTreeLast']);
    Route::put('uploadEventImage/{id}', [EventController::class, 'uploadEventImage']);
});


Route::get("simple-qrcode", [SimpleQRcodeController::class, 'generate']);
Route::get("userClubs/{id}", [InscriptionController::class, 'getUserClubs']);
Route::get('users/verify/{token}', [AuthController::class, 'verifyUser'])->name('verify');
Route::get('file/{filename}', [FileController::class, 'getFile']);



//admin group
Route::group([
    'prefix' => 'admins'
], function () {

    Route::get('countEvents', [EventController::class, 'countEvents']);
    Route::get('countUsers', [UserController::class, 'countUsers']);


    Route::get('countClubs', [ClubController::class, 'countClubs']);

    Route::get('eventBudget/{idevent}', [BudgetController::class, 'eventBudget']);
    Route::get('budgetrest/{idevent}/{rest}', [BudgetController::class, 'budgetrest']);

    Route::get('mostRecentEvent', [EventController::class, 'mostRecentEvent']);

    Route::get('YearEvents', [EventController::class, 'YearEvents']);

    Route::get('monthEvents/{id}', [EventController::class, 'monthEvents']);

    Route::get('ClubTotalRegistration', [InscriptionController::class, 'ClubTotalRegistration']);

    Route::get('TotalEventParticipant', [EventParticipantController::class, 'TotalEventParticipant']);
    // Route::get('countUsers', [UserController::class, 'countUsers']);

    Route::post('clubScore', [ClubEvaluationController::class, 'clubScore']);

    Route::get('listSortedClubs', [ClubEvaluationController::class, 'listSortedClubs']);

    Route::get('listnonSortedClubs', [ClubEvaluationController::class, 'listnonSortedClubs']);

    Route::get('countUsersOfThisMonth', [UserController::class, 'countUsersOfThisMonth']);

    Route::get('countClubsOfThisYear', [ClubController::class, 'countClubsOfThisYear']);

    Route::get('countEventsOfThisMonth', [EventController::class, 'countEventsOfThisMonth']);

    Route::get('pendingEvents', [EventController::class, 'pendingEvents']);

    Route::put('eventValidation/{event_name}/{club_name}', [EventController::class, 'eventValidation']);

});
