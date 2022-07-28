<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Result;

class EpisodeController extends Controller
{
    public function getEpisodes()
    {
        $episode =  Episode::withCount('questions')->with('questions')->get();
        return $episode;
    }
    public function getActiveEpisode()
    {
        return Episode::where('status', 1)->first();
    }
    public function getQuestions()
    {
        return Episode::where('status', 1)->first()->questions;
    }
    public function activeEpisode(Request $request)
    {
        Episode::where('status', 1)->update([
            'status' => ''
        ]);
        Episode::where('id', $request->id)->update([
            'status' => '1'
        ]);
       return Episode::all();
    }
    public function storeResult(Request $request)
    {
        // return $request->all();
        $episodeId = Episode::where('status', 1)->first()->id;
        Result::create([
            'trainee_id' => $request->evaluation['traineeID'],
            'episode_id' => $episodeId,
            'evaluation_data' => $request->evaluation['result']
        ]);
        return Result::where('trainee_id', $request->evaluation['traineeID'])->first();

    }
}
