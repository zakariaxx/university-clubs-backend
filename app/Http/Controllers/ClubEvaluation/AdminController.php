<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Budget;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller{




    public function store()
    {

    }

    public function show($id)
    {
        $admin = Admin::find($id);
        return response()->json($admin);
    }

    public function index()
        {

            $admin =User::has('admins')->get();
            return response()->json($admin);

        }

    public function destroy()
    {

    }




}



