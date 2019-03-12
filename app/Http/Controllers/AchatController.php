<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crypto;
use App\Transaction;
use App\Cotation;
use App\User;

class AchatController extends Controller
{
    public function index()
    {
        $cryptos = Crypto::all();   	
        return view('transaction.achat',compact('cryptos'));
    }

}
