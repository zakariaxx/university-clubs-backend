<?php

namespace App\Http\Controllers\Inscription;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscription=inscription::all();
        return response()->json($inscription,201);
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
            'id_user' => 'required|int',
            'id_club' => 'required|int',
            'inscription_date' => 'required|date',
            'active'=>'boolean',
        ]);

        $inscription =new Inscription(

            [
                'id_user' => $request->id_user,
                'id_club' => $request->id_club,
                'id_role' => $request->id_role,
                'inscription_date' => $request->inscription_date,
                'active'=> $request->actif
            ]

        );

        $inscription->save();

        return response()->json($inscription,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function show(Inscription $inscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscription $inscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inscription  $inscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscription $inscription)
    {
        //
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

}
