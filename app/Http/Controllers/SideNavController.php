<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class SideNavController extends Controller
{
    public function index()
    {           
    	return view('clients.partials.sidenav');
    }

/*
    public function show($id)
    {    
        $user = User::find($id); 
        dd($user);       
    	return view('clients.edit', compact('user'));
    } */
}
