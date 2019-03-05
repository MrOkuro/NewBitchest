<?php

namespace App\Http\Controllers;

use App\Charts\BitchestGraph;
use App\Cotation;
use App\Crypto;
use App\User;
//use Charts;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function show($crypto_id)
    {   
        
        //$cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        $cotations = Cotation::select('*')->where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        $cryptos = Crypto::find($crypto_id);

        

//        $cotation = [];
        $date = [];

       /* for ($i=0; $i < 30; $i++) {
            array_push($cotation, $cotations[$i]->cotation);            
        }*/


            $chart = new BitchestGraph;

            

            $dates = [];
            $taux = [];
            foreach($cotations as $cotation) {
                array_push($taux, (float) $cotation->taux);
                array_push($dates, $cotation->date);
            }
            dump($taux);
            $chart->labels($dates);
            $chart->dataset($cryptos->nom, 'line', $taux);
      
                  

        return view('graph.index',compact('chart'));
    }
}
