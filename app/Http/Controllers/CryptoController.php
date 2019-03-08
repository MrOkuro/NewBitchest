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
    public function index(Request $request)
    {
        $users = User::where('id', Auth::id())->get();
        $transactions = Transaction::where('user_id', Auth::id())->get();

        $achats_liste = [];        

        $achats = array();

        $total = 0;

        foreach ($transactions as $transaction) {
            
            $crypto = Crypto::where('id', $transaction->crypto_id)->first();
            $cotation = DB::table('cotations')
                    ->select(DB::raw('cotations.taux'))
                    ->where('crypto_id', $transaction->crypto_id)
                    ->orderBy('cotations.date', 'desc')
                    ->limit(1)
                    ->get();

            $cotation = $cotation[0]->taux;
           
            

            $achats_liste[$transaction->crypto_id]['crypto'] = $crypto;
            $achats_liste[$transaction->crypto_id]['quantite_crypto'] = $transaction->quantite_crypto;
            $achats_liste[$transaction->crypto_id]['montant'] = $achats_liste[$transaction->crypto_id]['quantite_crypto'] * $cotation;


            $total += $achats_liste[$transaction->crypto_id]['montant'];
            
        }       
    	return view('crypto.index',compact('achats_liste','cotations','users'));
    }



}
