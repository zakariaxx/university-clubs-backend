<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs=Club::all();
        return response()->json($clubs);
    }


    /**
     * Display a listing of the resource.
     * 3 resource randomly
     *
     * @return \Illuminate\Http\Response
     */
    public function getRandomUsers()
    {
        $clubs=Club::all()->random(3);
       return response()->json($clubs);
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
            'club_name' => 'required|string',
            'description' => 'required|string',
            'type_club' => 'required|string',
            'email'=>'required|email',
            'creation_date' => 'required|date',
            'pedagogique_referent' => 'required|string',
            'fiche_signalitique' => 'required',


        ]);



        $club = new Club(

          [
              'club_name' => $request->club_name,
              'description'=> $request->description,
              'type_club'=> $request->type_club,
              'email'=> $request->email,
              'creation_date'=> $request->creation_date,
               'pedagogique_referent' =>$request-> pedagogique_referent,
               'fiche_signalitique' => $request->fiche_signalitique,
          ]);


        $filename=(new FileController)->uploadImage($request);
        $club-> logo = $filename;
        $club->save();
        return response()->json($club,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $club=Club::find($id);
        $club->update($request->all());
        return response()->json($club,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club=Club::find($id);
        $club -> delete();
        return response()->json([
            'message' => 'deleted!'
        ], 201);
    }
}
