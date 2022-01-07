<?php

namespace App\Http\Controllers;

use \App\Models\ReferalUsing;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {

        $credentials =  $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $remember = $request->remember == 'on';

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'credentials' => 'Maaf, Username atau Password Anda salah',
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'nama_lengkap' => ['required', 'max:100', function ($attr, $value, $fail) {
                if (!preg_match('/^[\pL\s]+$/u', $value)) {
                    $fail('nama lengkap hanya boleh menggunakan huruf.');
                }
            }],
            'username' => ['required', 'unique:users,username', function ($attr, $value, $fail) {
                if (!preg_match('/^\S*$/u', $value)) {
                    $fail($attr . ' tidak boleh menggunakan spasi.');
                }
            }],
            'password' => [
                'required', 'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->uncompromised()
            ],
            'no_telepon' => 'required|numeric|digits_between:11,13',
            'kode_referal' => [
                'nullable', function ($attr, $val, $fail) {
                    $kode_referal = Referral::where('code', $val)->first();
                    if (!$kode_referal) {
                        $fail('Kode Referal tidak terdaftar');
                    }
                }
            ]

        ]);

        DB::transaction(function () use ($request) {
            $kode_referal = $request->kode_referal;
            $user = User::create([
                'name' => $request->nama_lengkap,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'is_active' => 0,
                'no_telepon' => $request->no_telepon,
                'role_id' => 2
            ]);

            $this->create_referal($user);

            if ($kode_referal) {
                $pemilik_referal = User::whereHas('latestReferral', function ($query) use ($kode_referal) {
                    $query->where('code', $kode_referal);
                })->first();

                ReferalUsing::create([
                    'user_id' => $pemilik_referal->id,
                    'referral_id' => $pemilik_referal->latestReferral->id,
                    'using_by' => $user->id
                ]);
            }

            Auth::login($user);
        });
        return redirect()->route('home')->with('transfer', 'Akun telah berhasil dibuat , silahkan lakukan investasi pertama anda untuk pengaktifan akun Anda !');
    }
    public function random()
    {
        return Str::random(8);
    }
    public function create_referal($user)
    {
        $referal = $this->random(8);
        $is_exist = Referral::where('code', $referal)->first();

        while ($is_exist) {
            $this->create_referal($user);
        }

        if (!$is_exist) {
            $referal =  Referral::create([
                'user_id' => $user->id,
                'code' => $referal
            ]);

            return $referal;
        }
    }
}
