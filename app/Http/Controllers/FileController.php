<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{

    public function uploadimage(Request $request)
    {
        if ($request->hasfile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->StoreAs('public/', $filename);
            echo "hi --------";
            return $filename;

        } else {
            return response()->json(['message' => 'Select image first.']);
        }

    }

    public function getFile(String $filename)
    {
        $file=Storage::url($filename);
        return response()->json(url($file));
    }




}
