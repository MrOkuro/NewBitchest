<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\User;


class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();     
    	return view('admin.index',compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('admin.create',compact('user'));
    }

    public function store(AdminRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user -> save();
        $request->session()->flash('alert', ['class'=>'success','message'=>' Nouvel utilisateur enregistré!!']);

        return redirect(url()->previous());
    }

    public function show()
    {

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit',compact('user'));
    }

    public function update(AdminRequest $request, User $user)
    {
        if($user->update($request->all()) !== false)
        {
            $request->session()->flash('alert', ['class'=>'success','message'=>'Profil utilisateur mis à jour']);
        }
        //dd($request->all());
        
        return redirect(url()->previous());
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return view('admin.index', compact('user'));

    }
}
