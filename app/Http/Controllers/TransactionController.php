<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moi = now()->format('m/y');
        
        $transactions = Transaction::where('moi', $moi)->get();
        return view('transactions.index', compact('transactions'));
    }

    //recuperer 
    public function filter(Request $request)
    {
        if($request->month){
            $moi = $request->month;
        }
        else{
            $moi = now()->format('m/y');
        }
        
        $transactions = Transaction::where('moi', $moi)->get();

        //dd($transactions);
    
        return view('transactions.mensuelle', compact('transactions'));
    }

    /**
     * afficher les transactions de l'utilisateur connecté
     */
    public function mesTransactions(Request $request)
    {
        if($request->month){
            $moi = $request->month;
        }
        else{
            $moi = now()->format('m/y');
        }
        $userId= Auth::user()->id;

        $transactions = DB::table('transactions')
                        ->WHERE("user_id" , $userId )
                        ->where('moi', $moi)
                        ->get();

        return view('transactions.mesTransactions', compact('transactions'));
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
