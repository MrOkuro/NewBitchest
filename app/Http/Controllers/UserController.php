<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {            
    	return view('clients.index');
    }

    public function create()
    {
    	return view('clients.forme_solde');
    }

    public function store()
    {
    	 $user = new User();
        $user->solde = $request->solde;
        if($user->save() !== false)
        {
            $request->session()->flash('alert', ['class'=>'success','message'=>'Solde Enregistré!']);
        }
        return redirect(route('client.index'));
        
    }
}
