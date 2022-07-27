<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;

class EpisodeController extends Controller
{
    public function getEpisodes()
    {
        return Episode::all();
    }
    public function getQuestions(Episode $episode)
    {
        return $episode->questions;
    }
}
