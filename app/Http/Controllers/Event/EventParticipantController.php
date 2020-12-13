<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\EventParticipant;
use Illuminate\Http\Request;

class EventParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventParticipant  $eventParticipant
     * @return \Illuminate\Http\Response
     */
    public function show(EventParticipant $eventParticipant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventParticipant  $eventParticipant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventParticipant $eventParticipant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventParticipant  $eventParticipant
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventParticipant $eventParticipant)
    {
        //
    }
}
