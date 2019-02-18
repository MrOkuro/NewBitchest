<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;
use App\User;
use App\Transaction;
use App\Cotation;

class CryptoController extends Controller
{
    public function index()
    {
        $cryptos = Crypto::all();
        //dd ($cryptos);        
    	return view('crypto.index',compact('cryptos'));
    }



    public function index_cotations()
    {
        $cryptos = Crypto::all(); 
        //dd ($cryptos);
        //$cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['cotation'])->get();       
    	return view('crypto.cotation',compact('cryptos'));
    }
}
