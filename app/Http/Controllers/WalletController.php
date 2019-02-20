<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function getTotalWallet()
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
    }
}
