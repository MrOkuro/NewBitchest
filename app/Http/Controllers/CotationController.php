<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;
use App\Cotation;

class CotationController extends Controller
{
    /*public function index($crypto_id)
    {
        //$cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        $cryptos = Crypto::where('crypto_id','=',$crypto_id)->with(['cotation'])->get();
        return view('crypto.cotation',compact('cryptos'));
    } */


    public function show($crypto_id)
    {
        $cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        $cryptos = Crypto::find($crypto_id);
        return view('crypto.show_historique_cotation',compact('cryptos','cotations'));
    }
}
