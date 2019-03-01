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
    	$query = '
    	SELECT
			cotations.id
    		,cotations.valeur
    		,cotations.date
    		,cotations.evolution
    		,cryptos.id
    		,cryptos.nom
		FROM (
				SELECT
					MAX(Id) as id
					,crypto_id
				FROM Cotations
				GROUP BY crypto_id
			) AS MaxCotation
			INNER JOIN Cotations ON Cotations.id = MaxCotation.id
			INNER JOIN Cryptos ON Cryptos.id = Cotations.crypto_id
    	';
    	return DB::query(DB::Raw($query));
    }
}


