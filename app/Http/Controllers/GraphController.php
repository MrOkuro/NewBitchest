<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\Cotation;
use App\Crypto;
use App\User;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function show($crypto_id)
    {   
        
        //$cotations = Cotation::where('crypto_id','=',$crypto_id)->with(['crypto'])->whereDate('created_at')->count();
        /*$cotations = Cotation::whereDate('created_at')->count();
        $cryptos = Crypto::find($crypto_id); */

        $today_users = User::whereDate('created_at', today())->count();
        $yesterday_users = User::whereDate('created_at', today()->subDays(1))->count();
        $users_2_days_ago = User::whereDate('created_at', today()->subDays(2))->count();
        
      $chart = new SampleChart;
      $chart->labels(['Yesterday', 'Today']);
      $chart->dataset('My dataset', 'line', [$users_2_days_ago, $yesterday_users, $today_users]);


       	
        return view('graph.index',compact('chart'));
    }
}
