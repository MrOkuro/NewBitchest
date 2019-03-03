<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;
use App\User;
use App\Transaction;
use App\Cotation;
use Illuminate\Support\Facades\Auth;
use DB;

class CryptoController extends Controller
{
    public function index()
    {
        //$cryptos = Crypto::all();


        $users = User::where('id', Auth::id())->get();
        $transactions = Transaction::where('user_id', Auth::id())->get();
        $achats_liste = [];
        $total = 0;
        //dd ($cryptos);        
        //dd($users);
        $achats = array();
        foreach ($transactions as $transaction) {
            $crypto = Crypto::where('id', $transaction->crypto_id)->first();
            $achats = DB::table('cotations')
                    ->select(DB::raw(' max(cotations.date) AS date, 
                        ANY_VALUE(cotations.taux) AS taux,
                        ANY_VALUE(cotations.crypto_id) AS crypto_id'))
                    ->where('crypto_id', $transaction->crypto_id)
                    ->groupBy('cotations.crypto_id')
                    ->orderBy('cotations.crypto_id')
                    ->get();
        
            if (!isset($achats_liste[$transaction->crypto_id])) {
                    $achats_liste[$transaction->crypto_id]['crypto'] = $crypto;
                    $achats_liste[$transaction->crypto_id]['quantite_crypto'] = $transaction->quantite_crypto;
                foreach ($achats as $achat) 
                {
                    $taux = $transaction->quantite_crypto*$achat->taux;
                    $achats_liste[$transaction->crypto_id]['achat'] = $taux;
                }
            }

            $total += $transaction->quantite_crypto*$achat->taux;
        }
        //dump($transactions);
        //dd($achats);
        //dd($achats_liste);
        //dd($total);
        
    	return view('crypto.index',compact('achats_liste','cotations','users'));
    }



}
