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
        return $this->hasMany(Cotation::class);       
    }

    public function transaction() 
	{
		return $this->hasMany(Transaction::class);
    }
}
