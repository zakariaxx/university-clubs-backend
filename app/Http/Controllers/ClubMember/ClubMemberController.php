<?php

namespace App\Http\Controllers\ClubMember;

use App\Models\ClubMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClubMemberController extends Controller
{


    public function index()
    {
       $clubmember= User::has('Club_members')->get();
       return response()->json($clubmember);
    }

    public function create()
    {

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
     * @param  \App\Models\ClubMember  $clubMember
     * @return \Illuminate\Http\Response
     */
    public function show(ClubMember $clubMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClubMember  $clubMember
     * @return \Illuminate\Http\Response
     */
    public function edit(ClubMember $clubMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClubMember  $clubMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClubMember $clubMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClubMember  $clubMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClubMember $clubMember)
    {
        //
    }
}
