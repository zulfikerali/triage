<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Result;
use App\Models\Question;
use App\Models\ColorCode;
use App\Models\VictimQuestion;
use Owenoj\LaravelGetId3\GetId3;

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
        return Episode::where('status', 1)->first()->questions()->with('victimQuestions')->get();
        // return Episode::with('questions.victimQuestions')->where('status', 1)->first();
        //()->inRandomOrder()->get();
    }
    public function getQuestionsbyEpisodeId($id)
    {
        return Episode::find($id)->questions()->with('victimQuestions')->get();
        // return Episode::with('questions.victimQuestions')->where('status', 1)->first();
        //()->inRandomOrder()->get();
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
    public function storeAnswerSummit(Request $request)
    {
        $episodeId = Episode::where('status', 1)->first()->id;

        Result::updateOrCreate(
            [ 'trainee_id' => $request->evaluation['traineeID'], 'episode_id' => $episodeId ],
            [
                'trainee_id' => $request->evaluation['traineeID'],
                'episode_id' => $episodeId,
                'evaluation_data' => $request->evaluation['result'],
                'result_data' => $request->evaluation['resultValue']
            ]
        );
//       return Result::create([
//            'trainee_id' => $request->evaluation['traineeID'],
//            'episode_id' => $episodeId,
//            'evaluation_data' => $request->evaluation['result'],
//            'result_data' => $request->evaluation['resultValue'],
//            'question_id' => 1,
//            'correct_priority' => 1,
//            'correct_color_code' => '1',
//            'selected_priority' => 2,
//            'selected_color_code' => 1
//        ]);
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

        if($request->file){
            $track = new GetId3(request()->file);
            $video_length = $track->getPlaytime();
            $vl = explode(":",$video_length);
            $video_length_in_second =  ($vl[0] * 60) + $vl[1];
            $upload_path = public_path('videos');
            $fileName = 'ep_'.$request->episode.time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move($upload_path, $fileName);

            Question::create([
                'episode_id' => $request->episode,
                'video_path' => $fileName,
                'video_length' => $video_length_in_second,
                'color_code' => $request->colorCode,
                'color_code_marks' => $request->colorCodeMark,
                'priority' => $request->priority,
                'priority_marks' => $request->prioritMark
            ]);
        }
        return 'success';
    }
    public function allColorCode()
    {
        return ColorCode::all();
    }
    public function getTraineeResults()
    {
        return Episode::with('results:id,trainee_id,episode_id')->whereHas('results')->get();
    }
    public function questionsByEpisode(Episode $episode)
    {
       return $episode->questions;
    }
    public function storeVictimQuestion(Request $request)
    {
        VictimQuestion::create([
            'question_id' => $request->questionData['question'],
            'paramedic_question' => $request->questionData['paramedicQues'],
            'victim_answer' => $request->questionData['victimQues'],
        ]);
        return 'success';
    }
    public function getTrainee($episode)
    {
       return Episode::with('results')->where('id', $episode)->first();
    //    Result::where('episode_id', $episode)->get();
    }
    public function examDone($traineeId)
    {
       $episodeId = Episode::where('status', 1)->first()->id;
       $exam =  Result::where('trainee_id', $traineeId)->where('episode_id', $episodeId)->count();
       return $exam;
    }
}
