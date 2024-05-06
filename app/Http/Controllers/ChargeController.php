<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charge;
use App\Models\chargeDetail;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ChargeController extends Controller
{
    public function index(){

        $charges= Charge::all();

        //$montantCharge = DB('')

        return view('charge.index', compact('charges'));
    }

    public function create(){
        return view('charge.create');
    }

    public function store(Request $request){
        $charges= new Charge();

        $charges->titre = $request->input('titre');
        $charges->montant = $request->input('montant');
        $charges->date = $request->input('date');

        $charges->save();
        return Redirect::route('charges.index')->with('success', 'nouvelle charge ajouté!');
    }

    public function add($id){
        $charges = Charge::find($id);
        return view('charge.ajouter', compact('charges'));
    }

    public function addDetail(Request $request, $id)
    {
        $charges = Charge::find($id);
        $chargeDetail = new chargeDetail();

        $chargeDetail->charge_id = $charges->id;
       
        $chargeDetail->date = $request->input('date');
        $chargeDetail->titre = $request->input('titre');
        $chargeDetail->montant = $request->input('montant');
        $chargeDetail->detail = $request->input('detail');



        $chargeDetail->save();

        $total = $charges->montant + $chargeDetail->montant;
        $charges->montant = $total;

        //enregistrement de la transaction
        $dateHeure = now();

        $moi = now()->month;

        $transactions = new Transaction();
        $transactions->date = $dateHeure->format('d/m/y');
        $transactions->moi = $moi;
        $transactions->heure = $dateHeure->format('H:i:s');
        $transactions->type = 'Vente';
        $transactions->modePaiement = $request->modePaiement;
        $transactions->impot = $request->impot;
        $transactions->montantVerse = $request->input('montantVerse');
        $transactions->user_id = Auth::user()->id;
        $transactions->save();


        $charges->save();

        return redirect()->back();

    }

    public function showChargeDetail($id){
        $charges = Charge::with('chargeDetail')->find($id);
        //$charges = chargeDetail::where('charge_id', $id);
        //dd($charges);


        return view('charge.sousCharge', compact('charges'));
    }
}
