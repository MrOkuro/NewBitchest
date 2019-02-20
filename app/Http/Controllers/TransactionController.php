<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;
use App\User;
use App\Transaction;
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
        //$transactions = Transaction::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        $cryptos = Crypto::all();  	
        return view('crypto.form_create_achat',compact('cryptos','transactions'));
    }


    public function store(TransactionRequest $request)
    {
        $transaction = new Transaction;
        $transaction->crypto_id = $request->crypto_id;
        $transaction->montant = $request->montant;
        $transaction->quantite_crypto = $request->quantite_crypto;
        $transaction->user_id = auth()->user()->id;
        if($transaction->save() !== false)
        {
           $request->session()->flash('alert', ['class'=>'success','message'=>'Nouvel achat crée']);
        }
        return redirect(url()->previous());
        
    }


}

