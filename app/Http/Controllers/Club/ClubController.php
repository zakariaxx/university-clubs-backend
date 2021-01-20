<?php

namespace App\Http\Controllers\Club;

use App\Http\Controllers\Controller;
use App\Http\Controllers\file\FileController;
use App\Models\Club;
use App\Models\Inscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClubController extends Controller
{

    public function index()
    {
        $clubs=Club::all();
        return response()->json($clubs);
    }



    public function getRandomUsers()
    {
        $clubs=Club::all()->random(3);
       return response()->json($clubs);
    }




    public function store(Request $request)
    {
        $request->validate([
            'club_name' => 'required|string',
            'description' => 'required|string',
            'club_type' => 'required|string',
            'email'=>'required|email',
            'creation_date' => 'required|date',
            'mission_objectives'=> 'required|string',
            'office_member_list_file'=> 'required|string',
            'signalitic_file' => 'required|string',
            'constitution_file'=> 'required|string',
            'caisse'=>'required'

        ]);

$club = new Club(

          [
              'club_name' => $request->club_name,
              'description'=> $request->description,
              'club_type'=> $request->club_type,
              'email'=> $request->email,
              'creation_date'=> $request->creation_date,
              'mission_objectives' => $request->mission_objectives,
              'office_member_list_file'=> $request->office_member_list_file,
              'signalitic_file' => $request->signalitic_file,
              'constitution_file'=> $request->constitution_file,
              'caisse '=> $request->caisse,
          ]);


        $filename=(new FileController)->uploadImage($request);
        $club-> club_logo = $filename;
        $club->save();
        return response()->json($club,200);
    }

    public function getImage($filename){
        $path = storage_path('public/'. $filename);

        if (!File::exists($path)) {
            echo'getimage';
            abort(404);
        }


        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }


    public function update(Request $request, $id)
    {
        $club=Club::find($id);
        $club->update($request->all());
        return response()->json($club,200);
    }


    public function destroy($id)
    {
        $club=Club::find($id);
        $club -> delete();
        return response()->json([
            'message' => 'deleted!'
        ], 201);
    }

    public function UpdateClubImage(Request $request, int $id)
    {
        $filename=(new FileController)->uploadImage($request);
        $club = Club::find($id);
        $club-> logo = $filename;
        echo "hi --------";
        $club->save();
        return response()->json([$club,'message' => 'Image Uploaded Successfully']);
    }



    public function countClubs()
    {
        $clubs= Club::all();
        return $clubs->count();
    }


    public function countClubsOfThisYear()
    {

        $club = DB::table('clubs')
            ->where(DB::raw("extract(year from creation_date)"),'=',Carbon::now()->year);
        return response()->json($club->count(),201);
    }


}
