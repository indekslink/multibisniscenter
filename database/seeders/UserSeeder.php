<?php

namespace Database\Seeders;

use App\Models\Referral;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = 'Admin';
        $user->username = 'adminmbc';
        $user->password = Hash::make('adminmbc12345');
        $user->role_id = 1;
        $user->is_active = 1;
        $user->no_telepon = '081259832005';
        $user->avatar  = 'user.jpg';
        $user->save();


        Referral::create([
            'user_id' => $user->id,
            'code' => Str::random(8)
        ]);
    }
}
