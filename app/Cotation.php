<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cotation extends Model
{
    protected $fillable = [
        'crypto_id', 'valeur', 'date','cours','evolution',
    ];


    public function crypto() 
	{
		return $this->belongsTo('App\Crypto');
    }

    public static function getMaxCotationByCrypto()
    {
    	return DB::table('cotations')
    		->select(DB::Raw('cryptos.*, cotations.*'))
			->join('cryptos', 'cryptos.id', '=', 'cotations.crypto_id')
			->groupBy('nom');
    }
}
