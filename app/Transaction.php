<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'crypto_id', 'montant','quantite_crypto','type','etat',
    ];

    public function user() 
	{
		return $this->belongsTo('App\User');
    }

    public function crypto() 
	{
		return $this->belongsTo('App\Crypto');
    }
}
