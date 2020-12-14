<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::all();
        return response()->json($events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_event' => 'required|string',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'creation_date' => 'required|date',
            'place' => 'required|string',
            'event_link' => 'required|string',
            'event_type' => 'required|string',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_club'=>'required'

        ]);

        $event= new Event(

            [
                'name_event' => $request->name_event,
                'description'=> $request->description,
                'event_date'=> $request->event_date,
                'creation_date'=> $request->creation_date,
                'place'=> $request->place,
                'event_link'=> $request->event_link,
                'event_type'=> $request->event_type,
                'pictures'=> $request->picture,
                'id_club'=>$request->id_club,
            ]);
        $event->save();
        return response()->json($event,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->update($request->all());
        return response()->json($event,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event=Event::find($id);
        $event -> delete();
        return response()->json([
            'message' => 'deleted!'
        ], 201);
    }
}
