<?php

namespace App\Http\Controllers;

use App\Charts\BitchestGraph;
use App\Cotation;
use App\Crypto;
use App\User;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    /**
     * affiche l'historique de chaque crypto sur une courbe
     */
    public function show($crypto_id)
    {   
        
        //$cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        $cotations = Cotation::select('*')->where('crypto_id','=',$crypto_id)->with(['crypto'])->orderBy('cotations.date', 'asc')->get();
        $cryptos = Crypto::find($crypto_id);
        
        $chart = new BitchestGraph;
        $dates = [];
        $taux = [];
            foreach($cotations as $cotation) {
                array_push($taux, (float) $cotation->taux);
                array_push($dates, $cotation->date);
                }
        //dump($taux);
        $chart->labels($dates);
        $chart->dataset($cryptos->nom, 'line', $taux);
        return view('graph.index',compact('chart'));
    }
}
