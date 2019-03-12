<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;
use App\User;
use App\Transaction;
use App\Cotation;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Http\Requests\TransactionRequest;



class TransactionController extends Controller
{
    public function show($crypto_id)
    {
        $transactions = Transaction::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        $crypto = Crypto::find($crypto_id);        
    	return view('crypto.show_liste_transaction',compact('crypto','transactions'));
    }


    public function create($crypto_id)
    {
        $transactions = new Transaction;        
        $cryptos = Crypto::all();  	
        return view('crypto.form_create_achat',compact('cryptos','transactions'));
    }


    public function store(TransactionRequest $request)
    {
        $transaction = new Transaction;
        $transaction->crypto_id = $request->crypto_id;        
        $transaction->quantite_crypto = $request->quantite_crypto;
        $transaction->user_id = auth()->user()->id;
        if($transaction->save() !== false)
        {

            $users = User::where('id', Auth::id())->get();
            $transactions = Transaction::where('user_id', Auth::id())->get();

            $achats_liste = [];            
                
            //dump($users[0]->solde);
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

            $solde = $users[0]->solde - $total;    
            DB::table('users')->where('id', Auth::id())->update(['solde' => $solde]);
            
           /* if( $solde = $users[0]->solde - $total < 0)
            {
                //dd($solde);
                return back()->with('errorMessage','Votre solde \' est pas suffisant pour effectuer cet achat');
            }
            else
            {
                DB::table('users')->where('id', Auth::id())->update(['solde' => $solde]);   
            } */
    


           $request->session()->flash('alert', ['class'=>'success','message'=>'Nouvel achat enregistré.']);
        }
        return redirect(url()->previous());
        
    }


}

