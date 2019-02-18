<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Crypto;

class CryptoController extends Controller
{
    public function index()
    {
        $cryptos = Crypto::all();     
    	return view('admin.crypto_index',compact('cryptos'));
    }
}
