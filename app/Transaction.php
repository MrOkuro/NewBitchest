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
		return $this->belongsTo(User::class);
    }

    public function crypto() 
	{
		return $this->belongsTo(Crypto::class);
    }
}
