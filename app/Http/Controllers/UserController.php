<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller

{
    public function __construct()
    {
        $this->middleware('cek_role');
    }
    public function index()
    {
        $status_user = request()->query('status');
        if ($status_user == 'all') {
            return redirect()->route('users.index');
        }
        $users = User::with('referral')
            ->where('username', '!=', auth()->user()->username)
            ->when($status_user, function ($query, $status_user) {
                $query->where('is_active', $status_user == 'active');
            })
            ->latest()->get();

        return view('users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'max:100', function ($attr, $value, $fail) {
                if (!preg_match('/^[\pL\s]+$/u', $value)) {
                    $fail('nama lengkap hanya boleh menggunakan huruf.');
                }
            }],
            'no_telepon' => 'required|numeric|digits_between:11,13',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'avatar' => 'nullable|mimes:jpg,png,jpeg|max:2048',

        ]);

        $nama_file = null;
        if ($request->hasFile('avatar')) {
            $nama_file = $request->file('avatar')->getClientOriginalName();
            if ($user->avatar != 'user.jpg') {
                unlink('images/' . $user->avatar);
            }
            $request->file('avatar')->move('images/', $nama_file);
        };

        $user->updateOrFail([
            'name' => $request->nama_lengkap,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'avatar' => $request->hasFile('avatar') ? $nama_file : $user->avatar
        ]);
        return redirect()->back()->with('success', 'Data berhasil diperbaharui');
    }
    public function update_autentikasi(Request $request, User $user)
    {

        $request->validate([
            'username' => ['required', function ($attr, $value, $fail) {
                if (!preg_match('/^\S*$/u', $value)) {
                    $fail($attr . ' tidak boleh menggunakan spasi.');
                }
            }, Rule::unique('users')->ignore($user->username, 'username')],
            'password' => [
                'nullable',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->uncompromised(),

            ],
        ]);
        $user->updateOrFail([
            'username' => $request->username,
            'password' => $request->password ? Hash::make($request->password) : $user->password
        ]);

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Data autentikasi Anda berhasil diperbaharui');
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
