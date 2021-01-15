<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\File\FileController as FileFileController;
use App\Http\Controllers\FileController;
use App\Models\ClubMember;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{



    public function index()
    {
        $users=User::all();
       return response()->json($users);
    }



    public function update(Request $request,int $id)
    {

        $user = User::find($id);
        $user->update($request->all());
        return response()->json($user, 200);

    }

    function uploadUserImage(Request $request, $id)
    {
        /* $filename=(new FileFileController)->uploadimage($request);
        $user= User::find($id);
        $user-> photo = $filename;
        $user->save();
        return response()->json([$user,'message' => 'Image Uploaded Successfully']); */
        $path = $request->file('avatar')->store('avatars');

        return $path;

    }


    public function show(int $id)
    {

        $user = User::find($id);
        return response()->json($user,201);
    }

    public function countUsers()
    {
        $user = User::all();
        return $user->count();
    }

    public function countUsersOfThisMonth()
    {

        $user = DB::table('users')
            ->where(DB::raw("extract(month from created_at)"),'=',Carbon::now()->month);

        return response()->json($user->count(),201);
    }


}
