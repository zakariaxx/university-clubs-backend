<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function countEvents()
    {
        $events= Event::all();
        return $events->count();
    }


    public function mostRecentEvent()
    {
        return DB::table('events')
            ->orderBy('event_date','desc')
            ->select('id','event_date')
            ->take(3)
            ->get();
    }

    public function YearEvents()
    {
        return DB::table('events')
           -> select(DB::raw("extract(year from event_date) as year"),DB::raw("(COUNT(id)) as nbEvents"))
            ->Groupby(DB::raw('year') )
            ->get();
    }

    public function monthEvents($year)
    {
        return DB::table('events')
            -> select(DB::raw("extract(month from event_date) as month"),DB::raw("(COUNT(id)) as nbEvents"))
            ->where(DB::raw("extract(year from event_date)"),'=',$year)
            ->Groupby(DB::raw('month'))
            ->get();
    }


    public function countEventsOfThisMonth()
    {

        $events = DB::table('events')
            ->where(DB::raw("extract(month from event_date)"),'=',Carbon::now()->month);
        return response()->json($events->count(),201);
    }


    public function pendingEvents()
    {
        $events = DB::table('events')
            ->where('validate','=',false)
            ->get();

        return response()->json($events,201);
    }

    public function eventValidation($name_event,$club_name)
    {
        $event= Event::where('name_event','=',$name_event)
            ->where('club_name','=',$club_name)
        ->update(['validate'=>true]);
        return response()->json($event,201);
    }


}
