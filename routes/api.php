<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //     return $request->user();
    // });
Route::post('login', [AuthController::class, 'login']);
Route::post('register', RegistrationController::class);
Route::get('getEpisodes', [EpisodeController::class, 'getEpisodes']);
Route::get('getActiveEpisode', [EpisodeController::class, 'getActiveEpisode']);
Route::get('getQuestions', [EpisodeController::class, 'getQuestions']);
Route::post('activeEpisode', [EpisodeController::class, 'activeEpisode']);
Route::post('storeResult', [EpisodeController::class, 'storeResult']);
Route::post('storeAnswerSummit', [EpisodeController::class, 'storeAnswerSummit']);
Route::get('getResult/{episodeId}/{traineeId}', [EpisodeController::class, 'getResult']);
Route::post('storeQuestion', [EpisodeController::class, 'storeQuestion']);
Route::get('allColorCode', [EpisodeController::class, 'allColorCode']);
Route::get('getTraineeResults', [EpisodeController::class, 'getTraineeResults']);
Route::get('questionsByEpisode/{episode}', [EpisodeController::class, 'questionsByEpisode']);
Route::post('storeVictimQuestion', [EpisodeController::class, 'storeVictimQuestion']);
Route::get('getTrainee/{episode}', [EpisodeController::class, 'getTrainee']);
Route::get('exam-done/{traineeId}', [EpisodeController::class, 'examDone']);
Route::middleware('auth:sanctum')->group(function () {
    // Route::patch('/profile', ProfileController::class);
    // Route::patch('/password', PasswordController::class);

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('update-profile', [AuthController::class, 'updateProfile']);

    // in app verification
    // Route::post('/verify-email/{id}/{hash}', [VerificationController::class, 'verify'])->name('verify');
    // Route::post('/verify-resend', [VerificationController::class, 'resend']);
});
