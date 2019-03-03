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
        
        $cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['crypto'])->get();
        $cryptos = Crypto::find($crypto_id);

        $cotation = [];
        $date = [];

        for ($i=0; $i < 30; $i++) {
            array_push($cotation, $cotations[$i]->cotation);
        }

            $chart = new BitchestGraph;
            $chart->labels(['One', 'Two', 'Three', 'Four']);
            $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
            $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

            

       
        
      /*$chart = new SampleChart;
      $chart->labels(['Yesterday', 'Today']);
      $chart->dataset('My dataset', 'line', [$users_2_days_ago, $yesterday_users, $today_users]); */
      //dd($chart); 

           /* $chart = Charts::database(User::all(), 'bar', 'highcharts')
                    ->setElementLabel("Total")
                    ->setDimensions(1000, 500)
                    ->setResponsive(false)
                    ->groupByDay(); */

          /*$chart = Charts::create('bar', 'highcharts')
                    ->setTitle('My Nice Chart')
                    ->setLabels(['First','Second','Third'])
                    ->setValues(['5,10,20'])
                    ->setElementLabel("Total")
                    ->setDimensions(1000, 500)
                    ->setResponsive(false); */

        return view('graph.index',compact('chart'));
    }
}
