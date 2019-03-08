<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;
use App\Cotation;
Use DB;

class CotationController extends Controller
{
    /**
     * affiche la liste générale des cotations selon la date la plus récente pour chaque crypto
     */
    public function index()
    {      
        $cotations = DB::table('cotations')
            ->select(DB::raw(' cryptos.id,cryptos.nom, cryptos.image, 
                             cotations.taux'))
            ->join('cryptos', 'cotations.crypto_id', '=', 'cryptos.id')            
            ->orderBy('cotations.date', 'desc')
            ->limit(10)
            ->get();
        //dd($cotations);
        return view('crypto.cotation',compact('cotations'));
    } 

    /**
     * affiche l'historique de chaque crypto
     */
    public function show($crypto_id)
    {
        $cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        $cryptos = Crypto::find($crypto_id);
        //dump($cotations);
        return view('crypto.show_historique_cotation',compact('cryptos','cotations'));
    }
}
