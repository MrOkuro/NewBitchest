<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use DB;
use App\Cotation;
use App\Crypto;

class GraphController extends Controller
{
    public function show($crypto_id)
    {   
        
        $cotations = Cotation::where(DB::raw('crypto_id','=',$crypto_id)->with(['crypto']))->get();
        $cryptos = Crypto::find($crypto_id);
        
        $chart = Charts::database($cotations, 'bar', 'highcharts')
      ->title("Monthly new Register Users")
      ->elementLabel("Total Users")
      ->dimensions(1000, 500)
      ->responsive(false)
      ->groupByMonth(date('Y'), true);


       	
        return view('graph.index',compact('chart'));
    }
}
