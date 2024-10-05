<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::check())
        {
            $usertype =Auth()->user()->usertype;

            if($usertype == 'user')
            {
                return view('home.index');
            }
            else if($usertype == 'admin')
            {
                return view('admin.index');
            }
            else
            {
                return redirect()->black();
            }

        }
    }

    public function home(){
        return view('home.index');
    }
}