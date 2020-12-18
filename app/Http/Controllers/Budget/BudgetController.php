<?php

namespace App\Http\Controllers\Budget;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function store(Request $request)
    {
        $budget = new Budget(
            [
                'montant'=>$request->montant,
                'rest'=>$request->rest,
                'facture'=>$request->facture,
                'id_club'=>$request->id_club,

            ]);
    }



    public function index()
    {
        $budget=Budget::all();
        return response()->json($budget,201);
    }



    public function update(Request $request, int $id)
    {

        $budget=Budget::find($id);
        $budget->update($request->all());
        return response()->json($budget,200);
    }


    public function destroy( int $id)
    {
        $budget=Budget::find($id);
        $budget -> delete();

        return response()->json(['message' => 'deleted!'], 201);
    }
}
