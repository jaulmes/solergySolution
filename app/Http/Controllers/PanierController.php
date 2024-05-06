<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Produit;
use App\Models\Transaction;
use App\Models\Vente;
use Barryvdh\DomPDF\Facade\Pdf;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller
{

    /**
     * afficher les produit
     */
    public function afficheProduit(){
        $produits = Produit::all();
        $quantite=\Cart::getContent()->count();
        

        return view('panier.index', compact('produits', 'quantite'));
    }

    //afficher les detail d'un article 
    public function detailProduit(Request $request, $id){

        $produits = Produit::Where('id', $id)->first();

        //verifier que le produit est disponible
        $stock = $produits->stock <= 0 ? 'indisponible' : 'disponible';

        return view('panier.showArticle', [
            "produits" => $produits,
            "stock" => $stock
        ]);
    }

    public function ajouterAuPanier(Request $request){

        //recuperer le produit ajoute dans le panier 
        $produits = Produit::find($request->id);


        $cart = \Cart::getContent();

        $itemNames=[];
        // Parcours le panier pour trouver le nombre de fois que le produit est ajouté au panier
        foreach ($cart as $item) {
            $itemNames[]=$item->name;
            
            
        }
        //dd($itemNames);
        $occurences=array_count_values($itemNames);
        
        //$quantite=2;
        foreach($occurences as $itemNames=>$count){

            if($count>1){
                return redirect()->route('panier.index')->with('erreur', 'produit deja ete ajoute au panier');
            }
            else{
                
            }
        }


        //ajouter le produit au panier
         $panier = \Cart::add($request->id, $request->name, $request->price, 1,array())
                    ->associate($produits);

        return redirect()->route('panier.index')->with('message', 'produit ajoute au panier');
    }

    public function retirerProduit($id, Request $request){
        
        \Cart::remove($request->id);

        return redirect()->back();
    }

    //afficher le panier de l'utilisateur
    public function index(){
        $panier = \Cart::getContent();
        return view('panier.monPanier', compact('panier'));
    }



    public function update( Request $request, $id){
        

        $data = $request->json()->all();
 
        if($data['quantity'] > $data['stock']){
            Session::flash('erreur', 'la quantite de ce produit est insufisante');
            return response()->json(['erreur'=> 'produit insufisant']);
        }
        \Cart::update($id, [
            'quantity' => $data['quantity']
        ]);
        Session::flash('succes', 'la quantite a bien ete mis a jour');
        return response()->json(['Success'=> 'panier mis a jour avec succes']);

    }

    public function delete($id){
        \Cart::remove($id);
        return redirect()->back();
    }

    public function validerVente(Request $request){
        $montantTotal = \Cart::getTotal();

        //j'enregistre le client lies a la vente
        $clients = new Client();
        $clients->nom = $request->input('nom');
        $clients->numero = $request->input('numero');

        $dateHeure = now();

        $moi = now()->month;

        //enregistrement transaction
        $transactions = new Transaction();
        $transactions->date = $dateHeure->format('d/m/y');
        $transactions->moi = $moi;
        $transactions->heure = $dateHeure->format('H:i:s');
        $transactions->nomClient =$clients->nom;
        $transactions->numeroClient = $clients->numero;
        $transactions->type = 'Vente';
        $transactions->modePaiement = $request->modePaiement;
        $transactions->impot = $request->impot;
        $transactions->montantVerse = $request->input('montantVerse');
        $transactions->user_id = Auth::user()->id;

        $ventes = new Vente();
        $ventes->nomClient = $request->input('nom');
        $ventes->numeroClient = $request->input('numero');
        $ventes->montantTotal = $montantTotal;
        $ventes->montantVerse = $request->input('montantVerse');
        $ventes->impot = $request->input('impot');
        $ventes->qteTotal = \Cart::getContent()->count();
        $ventes->date = date('d-m-Y');
        $ventes->user_id = Auth::user()->id;
        if($ventes->montantTotal > $transactions->montantVerse){
            $ventes->statut = "non termine";
        }
        else{
            $ventes->statut = "termine";
        }

        $clients->save();
        $transactions->save();
        $ventes->save();
        

        //mettre a jour le stock
        foreach(\Cart::getContent() as $item){
            $articles = Produit::find($item->id);
            $articles->stock = $articles->stock - $ventes->qteTotal;
            $articles->save();
        }


        $pdf = Pdf::loadView('panier.facture',[
            'ventes' =>$ventes,
            'clients' =>$clients
        ]);

        \Cart::clear();
        return $pdf->stream();



    }

    public function afficheFacture(){
        return view('panier.factures');
    }
}
