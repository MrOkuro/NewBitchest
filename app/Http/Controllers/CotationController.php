<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;
use App\Cotation;

class CotationController extends Controller
{
    public function index()
    {

             //SELECT * FROM `cotations` INNER JOIN cryptos ON cryptos.id = cotations.crypto_id GROUP BY Nom
        //$cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
       // $cotations = Cotation::latest('id')->first();
       // $cotations = Cotation::where('crypto_id = (select max(`date`) from cotations)')->get();
        $cotations = Cotation::getMaxCotationByCrypto()->get();
        dd($cotations);
        return view('crypto.cotation',compact('cotations'));
    } 


    public function show($crypto_id)
    {
        $cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        $cryptos = Crypto::find($crypto_id);
        return view('crypto.show_historique_cotation',compact('cryptos','cotations'));
    }
}
