<?php

namespace App\Http\Controllers\Meeting;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meeting=Meeting::all();
        return response()->json($meeting,201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $meeting = new Meeting(
            [

                'title'=>$request->title,
                'object'=>$request->object,
                'meeting_date'=>$request->meeting_date,
                'meeting_time'=>$request->meeting_time,
                'participant_list'=>$request->participant_list,
                'link'=>$request->link,
                'location'=>$request->location,
                'repeat'=>$request->repeat,
                'creatby'=>$request->creatby,
             ]);

        $meeting ->save();

        return response()->json($meeting,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $meeting=Meeting::find($id);
        $meeting->update($request->all());
        return response()->json($meeting,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $meeting=Meeting::find($id);
        $meeting -> delete();

        return response()->json(['message' => 'deleted!'], 201);
    }
}
