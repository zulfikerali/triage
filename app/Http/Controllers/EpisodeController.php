<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Result;
use App\Models\Question;
use App\Models\ColorCode;

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
        return Episode::where('status', 1)->first()->questions()->inRandomOrder()->get();
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
       return Result::create([
            'trainee_id' => $request->evaluation['traineeID'],
            'episode_id' => $episodeId,
            'evaluation_data' => $request->evaluation['result'],
            'result_data' => $request->evaluation['resultValue']
        ]);
        return 'success';

    }
    public function getResult($episodeId, $traineeId)
    {
        // $episodeId = Episode::where('status', 1)->first()->id;
        return Result::where('trainee_id', $traineeId)->where('episode_id', $episodeId)->first();
    }
    public function storeQuestion(Request $request)
    {
        // return $request->all();
        $fileName = '';
        if($request->file){
            $upload_path = public_path('videos');
            $fileName = 'ep_'.$request->episode.time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move($upload_path, $fileName);
        }
        Question::create([
            'episode_id' => $request->episode,
            'video_path' => $fileName,
            'color_code' => $request->colorCode,
            'color_code_marks' => $request->colorCodeMark,
            'priority' => $request->priority,
            'priority_marks' => $request->prioritMark

        ]);
        return 'success';
    }
    public function allColorCode()
    {
        return ColorCode::all();
    }
}
