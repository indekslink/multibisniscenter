<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller

{
    // public function __construct(Request $request)
    // {
    //     $role = $request->user()->role;
    //     if ($role != 'admin') {
    //         $this->middleware('onlyAccessProfile');
    //     }
    // }
    public function index()
    {

        $users = User::with('referral')->where('username', '!=', auth()->user()->username)->latest()->paginate(6);

        return view('users.index', compact('users'));
    }

    public function show($username)
    {
        $user = User::with('latestReferral', 'referral', 'referal_using')->where('username', $username)->firstOrFail();

        $view  = 'users.show';
        if (auth()->user()->username  == $user->username) {
            $view = 'users.personal';
        }

        return view($view, compact('user'));
    }
}
