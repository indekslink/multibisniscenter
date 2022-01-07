<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Carbon;

class HomeController extends Controller
{


    public function getUsername()
    {
        return auth()->user()->username;
    }
    public function index()
    {



        $view = 'home.main';
        if (auth()->user()->role->name == 'admin') {
            $view = 'home.admin';
        }
        return view($view);
    }
    public function transfer()
    {
        return view('transfer');
    }
}
