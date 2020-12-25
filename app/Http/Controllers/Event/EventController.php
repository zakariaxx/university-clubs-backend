<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        $events=Event::all();
        return response()->json($events);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name_event' => 'string',
            'description' => 'string',
            'event_date' => 'date',
            'event_time' => 'string',
            'location' => 'string',
            'event_link' => 'string',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'club_name'=>'string',
           'theme'=>'string',
           'target_population'=>'string',
           'needs_for_realization'=>'string',
          'estimated_budget'=>'string',
          'communication_needs'=>'string',
          'clubs_involved'=>'string',
          'sponsors'=>'string',
          'expected_benefits'=>'string',
          'pre_event_file'=>'string',
          'made_by'=>'string',
          'submit_by'=>'string',
          'academic_year'=>'string',


        ]);

        $event= new Event(

            [
                'name_event' => $request->name_event,
                'description'=> $request->description,
                'event_date'=> $request->event_date,
                'event_time'=> $request->event_time,
                'location'=> $request->location,
                'event_link'=> $request->event_link,

                'pictures'=> $request->picture,
                'club_name'=>$request->club_name,
                'theme'=>$request->theme,
                'target_population'=>$request->target_population,
                'needs_for_realization'=>$request->needs_for_realization,
                'estimated_budget'=>$request->estimated_budget,
                'communication_needs'=>$request->communication_needs,
                'clubs_involved'=>$request->clubs_involved,
                'sponsors'=>$request->sponsors,
                'expected_benefits'=>$request->expected_benefits,
                'pre_event_file'=>$request->pre_event_file,
                'made_by'=>$request->made_by,
                'submit_by'=>$request->submit_by,
                'academic_year'=>$request->academic_year,
            ]);
        $event->save();
        return response()->json($event,200);
    }


    function getTreeLast(){
        $events = Event::all()->sortByDesc('event_date')->random(3);
        $lastevents =$events->slice(($events->count()-3),3);
        return response()->json($events,200);
    }

    function update(Request $request,int $id)
    {
        $event = Event::find($id);
        $event->update($request->all());
        return response()->json($event,200);

    }

    function destroy(int $id)
    {
        $event=Event::find($id);
        $event -> delete();
        return response()->json([
            'message' => 'deleted!'
        ], 201);
    }


}
