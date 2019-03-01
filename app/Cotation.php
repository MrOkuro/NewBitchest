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
            ->select(DB::Raw('cryptos.id,
                            cryptos.nom,
                            cryptos.image,
                            cotations.valeur,
                            cotations.cours,
                            cotations.evolution,
                             cotations.date'))
			->join('cryptos', 'cryptos.id', '=', 'cotations.crypto_id') {
                ->select(max('cotations.id')
                ->groupBy('cotations.id')

            }
			->groupBy('cryptos.id,cryptos.nom,cryptos.image,cotations.valeur,cotations.cours,cotations.evolution, cotations.date');
    }


