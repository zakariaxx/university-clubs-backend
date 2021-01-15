<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\File\FileController as FileFileController;
use App\Http\Controllers\FileController;
use App\Models\ClubMember;
use App\Models\User;
use Illuminate\Http\Request;

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




}
