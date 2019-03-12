<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;
use App\Transaction;
use App\Cotation;

class VenteController extends Controller
{
    public function index()
    {
        $cryptos = Crypto::all();   	
        return view('transaction.vente',compact('cryptos'));
    }


    public function getFormVente($crypto_id)
    {
        
        $transaction = Transaction::where('crypto_id', '=',$crypto_id)->latest()->first();       
        //dd($transaction);
        return view('transaction.form_create_vente',compact('transaction'));
    }

    /*public function getVente()
    {
        $users = User::where(Auth::id())->get();
        $total = 0;
        $achats = array();
        $transactions = Transaction::all();

            if(!isset($transactions))
            {
                foreach ($achats as $achat) 
                {
                    $taux = $transactions->quantite_crypto*$achats;
                }
                
            }
            else
            {
                $solde = $users[0]->solde - $total; 
            }
        return redirect(url()->previous());
    }*/
}
