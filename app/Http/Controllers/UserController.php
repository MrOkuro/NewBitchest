<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index()
    {            
    	return view('clients.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('clients.edit', compact('user'));
    }

    public function update($id, Request $request)
    {        
        User::find($id)->update($request->all());
        //dd($request);
        
        if($User->update($request->input()))
        {
             $request->session()->flash('alert', ['class'=>'success','message'=>'Profil mis à jour']);
        }
        
        return redirect(url()->previous());
    }
}
