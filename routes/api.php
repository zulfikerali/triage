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
// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any', '.*');
