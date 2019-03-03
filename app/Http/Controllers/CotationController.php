<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;
use App\Cotation;
Use DB;

class CotationController extends Controller
{
    public function index()
    {

             //SELECT * FROM `cotations` INNER JOIN cryptos ON cryptos.id = cotations.crypto_id GROUP BY Nom
        //$cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        //$cotations = Cotation::latest('id')->first();
       // $cotations = Cotation::where('crypto_id = (select max(`date`) from cotations)')->get();
        //$cotations = Cotation::getMaxCotationByCrypto()->get();
        //$cryptos = Crypto::all();
        //$cotations = Cotation::all();
        //dd($cotations);       
        $cotations = DB::table('cotations')
            ->select(DB::raw(' cryptos.id,cryptos.nom, cryptos.image, max(cotations.date) AS date,
                             ANY_VALUE(cotations.taux) AS taux'))
            ->join('cryptos', 'cotations.crypto_id', '=', 'cryptos.id')
            ->groupBy('cotations.crypto_id')
            ->orderBy('cotations.crypto_id')
            ->get();
        //dd($cotations);
        return view('crypto.cotation',compact('cotations'));
    } 


    public function show($crypto_id)
    {
        $cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        $cryptos = Crypto::find($crypto_id);
        return view('crypto.show_historique_cotation',compact('cryptos','cotations'));
    }
}
