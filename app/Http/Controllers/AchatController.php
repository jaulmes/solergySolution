<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Categori;
use App\Models\detailAchat;
use App\Models\Produit;
use App\Models\Transaction;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchatController extends Controller
{
    public function index(){
        $achats = Achat::all();
        return view('achats.index', compact('achats'));
    }

    //afficher les achat pour impots
    public function achatsImpot(){

        $achats = Achat::where('impot', 'on')->get();
        return view('achats.impot', compact('achats'));
    }

    public function create(){
        $categoris= Categori::all();
        
        return view('achats.ajouter', [
            'categoris'=>$categoris,
        ]);
    }
    public function afficherProduitCategorise( Request $request){
        $id = $request->input('categori_id');

        $produits = Produit::where('categori_id', $id)->get();
        return response()->json($produits);
    }

    public function createAchat(Request $request){
        $produits = Produit::all();
        $categoris= Categori::all();
        $quantite=\Cart::getContent()->count();
        
        return view('achats.cart', [
            'categoris'=>$categoris,
            'quantite' => $quantite,
            'produits' =>$produits
        ]);
    }

    public function store(Request $request){
        $achats = new Achat();

        $achats->qte = $request->compteur;
        $achats->date = now();
        $achats->total = 10000;
        $achats->save();

        $quantite = $request->quantite;
        $pu = $request->prixUnitaire;
        $prixTotal = $quantite * $pu;

        $detailAchat = array();

        for ($i=0; $i < $achats->qte ; $i++) { 
            $detailAchat['purchase_id'] = $achats->id;
            dd($detailAchat);
            $pDetails['product_id'] = $request->product_id[$i];
            $pDetails['quantity'] = $request->quantity[$i];
            $pDetails['unitcost'] = $request->unitcost[$i];
            $pDetails['total'] = $request->total[$i];
            $pDetails['created_at'] = Carbon::now();
            PurchaseDetails::insert($pDetails);
        }
        dd($prixTotal);
        $produits[]= $request->input('produits');
        dd($produits);

    }

    public function achatStoreCart(Request $request){
         //recuperer le produit ajoute dans le panier 
         $produits = Produit::find($request->id);


         //ajouter le produit au panier
          $panier = \Cart::add($request->id, $request->name, $request->price, 1,array())
                     ->associate($produits);

            return redirect()->back()->with('message', 'produit ajoute au panier');

    }
    
    public function validerAchat(Request $request){
        $montantTotal = \Cart::getTotal();


        $dateHeure = now();

        //enregistrement transaction
        $transactions = new Transaction();
        $transactions->date = $dateHeure->format('d/m/y');
        $transactions->heure = $dateHeure->format('H:i:s');
        $transactions->type = 'Achat';
        $transactions->modePaiement = $request->modePaiement;
        $transactions->impot = $request->impot;
        $transactions->montantVerse = $request->input('montantVerse');
        $transactions->user_id = Auth::user()->id;

        $achats = new Achat();
        $achats->total = $montantTotal;
        $achats->montantVerse = $request->input('montantVerse');
        $achats->impot = $request->input('impot');
        $achats->qte = \Cart::getContent()->count();
        $achats->date = date('d-m-Y');
        $achats->user_id = Auth::user()->id;
        if($achats->total > $transactions->montantVerse){
            $achats->statut = "non termine";
        }
        else{
            $achats->statut = "termine";
        }

        $transactions->save();
        $achats->save();

        //mettre a jour le stock
        foreach(\Cart::getContent() as $item){
            $articles = Produit::find($item->id);
            $articles->stock = $articles->stock + $achats->qteTotal;
            $articles->save();
        }

        \Cart::clear();
        return redirect()->back()->with('message', 'achat enregistré avec succes');
    }


}
