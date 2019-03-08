<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cotation extends Model
{
    protected $fillable = [
        'crypto_id', 'valeur', 'date','taux'
    ];


    public function crypto() 
	{
		return $this->belongsTo(Crypto::class);
    }


}


