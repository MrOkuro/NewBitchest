<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminSideNavController extends Controller
{
    public function index()
    {            
    	return view('admin.partials.adminsidenav');
    }
}
