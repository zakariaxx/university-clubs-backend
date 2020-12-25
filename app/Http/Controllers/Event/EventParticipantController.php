<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventParticipantController extends Controller
{

    public function index()
    {

        $eventParticipant=EventParticipant::all();
        return response()->json($eventParticipant);


    }


    public function store(Request $request)
    {
        $request->validate([
            'event_id'=>'required|integer',
            'participant_id'=>'required|integer',
            'invitation'=>'string',
            'participate'=>'boolean',
        ]);

        $eventParticipant=new EventParticipant(
            [

                'event_id'=>$request->event_id,
                'participant_id'=>$request->participant_id,
                'invitation'=>$request->invitation,
                'participate'=>$request->participate,


            ]);
        $eventParticipant->save();

    }


    public function show(EventParticipant $eventParticipant)
    {

    }


    public function update(Request $request, EventParticipant $eventParticipant)
    {

    }


    public function destroy($id)
    {
        $eventParticipant=Event::find($id);
        $eventParticipant -> delete();
        return response()->json([
            'message' => 'deleted!'
        ], 201);
    }


    public function TotalEventParticipant()
    {
        return DB::table('event_participants')
            -> select("event_id",DB::raw("(COUNT(id)) as nbParticipants"))
            ->Groupby(DB::raw('event_id'))
            ->get();
    }


}
