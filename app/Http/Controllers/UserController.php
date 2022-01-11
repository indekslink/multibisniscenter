<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller

{
    public function __construct()
    {
        $this->middleware('cek_role');
    }
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

    public function activate(Request $request, User $user)
    {

        $request->validate([
            'foto' => ['mimes:jpg,png,jpeg', function ($attr, $val, $fail) use ($user) {
                if (!$val) {
                    $fail('Silahkan upload bukti transfer user dengan nama : ' . $user->name);
                }
            }]
        ]);


        $nama_file = null;
        if ($request->hasFile('foto')) {
            $nama_file = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('images/bukti_transfer/', $nama_file);
        }
        $user->update(['is_active' => true]);
        $user->bukti_transfer()->updateOrCreate(
            ['id' => $user->id],
            ['foto' => $nama_file]
        );
        return redirect()->back()->with('success', $user->name . ' berhasil diaktifkan.');
    }
}
