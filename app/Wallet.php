<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'crypto_id', 'user_id', 'montant','montant_euro','quantite',
    ];


    public function user() 
	{
		return $this->hasOne('App\User');
    }
    
    public function crypto() 
	{
		return $this->hasMany('App\Crypto');
	}
}
