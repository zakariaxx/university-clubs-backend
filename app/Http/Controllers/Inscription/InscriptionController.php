<?php

namespace App\Http\Controllers\Inscription;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InscriptionController extends Controller
{

    public function index()
    {
        $inscription=inscription::all();
        return response()->json($inscription,201);
    }


    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|int',
            'id_club' => 'required|int',
            'inscription_date' => 'required|date',

        ]);

        $inscription =new Inscription(

            [
                'id_user' => $request->id_user,
                'id_club' => $request->id_club,
                'post' => $request->post,
                'inscription_date' => $request->inscription_date,
            ]

        );

        $inscription->save();

        return response()->json($inscription,200);
    }



    public function activationCompteMembre($id_user,$id_club)
    {
        $inscription= Inscription::where('id_user', $id_user)
            ->Where('id_club', $id_club)
            ->update(['actif' => 1]);
        return response()->json([$inscription,
            'message' => 'Votre compte est activé!'
        ],201);
    }

            public function  destroy($id)
        {
            $inscription = inscription::find($id);
            $inscription->delete();
            return response()->json([
                'message' => 'deleted!'
            ], 201);

        }


        public function ClubTotalRegistration()
        {
            return DB::table('inscriptions')
                -> select('id_club',DB::raw("(COUNT(id)) as nbParticipants"))
                ->Groupby(DB::raw('id_club'))
                ->get();

        }

        public function getUserClubs($id_user){
            $inscription =  DB::table('inscriptions')->where('id_user', 100)->get();

            $userClubs = DB::table('inscriptions')
                            ->join('users','inscriptions.id_user', '=', 'users.id')
                            ->join('clubs', 'inscriptions.id_club', '=', 'clubs.id')
                            ->select('inscriptions.*','clubs.id', 'clubs.club_name')
                            ->where('inscriptions.id_user', '=', $id_user)
                            ->get();

            return response()->json($userClubs, 201);

        }

    /*
    join request example
        $users = DB::table('users')
        ->join('contacts', 'users.id', '=', 'contacts.user_id')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.*', 'contacts.phone', 'orders.price')
        ->get(); */

}
