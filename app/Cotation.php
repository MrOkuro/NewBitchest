<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotation extends Model
{
    protected $fillable = [
        'crypto_id', 'valeur', 'date','cours','evolution',
    ];


    public function crypto() 
	{
		return $this->belongsTo('App\Crypto');
    }
}
