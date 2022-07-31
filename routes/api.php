<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EpisodeController;

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
Route::get('getEpisodes', [EpisodeController::class, 'getEpisodes']);
Route::get('getActiveEpisode', [EpisodeController::class, 'getActiveEpisode']);
Route::get('getQuestions', [EpisodeController::class, 'getQuestions']);
Route::post('activeEpisode', [EpisodeController::class, 'activeEpisode']);
Route::post('storeResult', [EpisodeController::class, 'storeResult']);
Route::get('getResult/{episodeId}/{traineeId}', [EpisodeController::class, 'getResult']);
Route::post('storeQuestion', [EpisodeController::class, 'storeQuestion']);
Route::get('allColorCode', [EpisodeController::class, 'allColorCode']);