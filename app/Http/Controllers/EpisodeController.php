<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;

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
    public function addResults()
    {
        return Episode::where('status', 1)->first()->questions;
    }
}
