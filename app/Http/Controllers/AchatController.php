<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;
use App\Transaction;
use App\Cotation;

class AchatController extends Controller
{
    public function index()
    {
        $cryptos = Crypto::all();   	
        return view('crypto.achat',compact('cryptos'));
    }

    /*public function getAchat()
    {
        $users = User::where(Auth::id())->get();
        $total_wallet = 0;
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
                $total_wallet += $transactions->quantite_crypto*$achats->taux;
            }
        return view('clients.partials.sidenav', compact('total_wallet', 'users'));
    } */



}
