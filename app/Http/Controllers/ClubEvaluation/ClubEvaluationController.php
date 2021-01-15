<?php

namespace App\Http\Controllers\ClubEvaluation;

use App\Http\Controllers\Controller;
use App\Models\ClubEvaluation;
use App\Models\Inscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClubEvaluationController extends Controller
{



    public function index()
    {
        //
    }

    public function clubScore(Request $request)
    {


        $evaluation=new ClubEvaluation(

            [

                'club_name' => $request->club_name,
                'score' => $request->score,
                'date'=>$request->date,
                'decision'=>$request->decision,
                'evaluation'=>$request->evaluation
            ]

        );

        $evaluation->save();

    }


//    public function clubScoreUpdate($clubname,$score)
//        {
//            $evaluation= ClubEvaluation::where('id_user', $clubname)
//                ->Where('club_name', $clubname)
//                ->update(['score' => $score]);
//            return response()->json([$evaluation,
//                'message' => 'success!'
//            ],201);;
//        }


      public function listSortedClubs()
          {
              $evaluation= ClubEvaluation::where('date',Carbon::now()->year)
                ->Orderby('score','desc')
                ->get();
              return response()->json($evaluation,201);
          }


        public function listnonSortedClubs()
        {

            $evaluation = DB::table('clubs')
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('club_evaluations')
                        ->whereColumn('clubs.club_name', 'club_evaluations.club_name');
                })
                ->get();



            return response()->json($evaluation,201);
        }


}
