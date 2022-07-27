<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function getEpisodes()
    {
        return Episode::with(['questions'=> function($q){
            $q->sum('color_code_marks');
        }])->get();
        //return Episode::all();
    }
    public function getActiveEpisode()
    {
        return Episode::where('status', 1)->first();
    }
    public function getQuestions()
    {
        return Episode::where('status', 1)->first()->questions;
    }
    public function addResults()
    {
        return Episode::where('status', 1)->first()->questions;
    }
}
