<?php

namespace App\Http\Controllers\Meeting;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{

    public function index()
    {
        $meeting=Meeting::all();
        return response()->json($meeting,201);
    }


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


    public function show(Meeting $meeting)
    {
        //
    }


    public function update(Request $request,$id)
    {
        $meeting=Meeting::find($id);
        $meeting->update($request->all());
        return response()->json($meeting,200);
    }


    public function destroy( $id)
    {
        $meeting=Meeting::find($id);
        $meeting -> delete();

        return response()->json(['message' => 'deleted!'], 201);
    }
}
