<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    protected $fillable = [
        'nom', 'image', 'sigle',
    ];


    public function cotation() 
	{
		return $this->hasMany('App\Cotation');
    }

    public function transaction() 
	{
		return $this->hasMany('App\Transaction');
    }
}
