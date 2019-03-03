<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Crypto;
Use DB;

class CryptoController extends Controller
{
    public function index_cotations_admin()
    {
        //$cryptos = Crypto::all(); 
        $cotations = DB::table('cotations')
        ->select(DB::raw(' cryptos.id,cryptos.nom, cryptos.sigle, cryptos.image, max(cotations.date) AS date,
                         ANY_VALUE(cotations.taux) AS taux'))
        ->join('cryptos', 'cotations.crypto_id', '=', 'cryptos.id')
        ->groupBy('cotations.crypto_id')
        ->orderBy('cotations.crypto_id')
        ->get();    
    	return view('admin.crypto_index',compact('cotations'));
    }
}
