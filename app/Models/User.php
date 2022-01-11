<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
        'role_id',
        'username',
        'no_telepon',
        'avatar',
        'jenis_kelamin',
        'alamat'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function referral()
    {
        return $this->hasMany(Referral::class);
    }
    public function latestReferral()
    {
        return $this->hasOne(Referral::class)->latestOfMany();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function referal_using()
    {
        return $this->hasMany(ReferalUsing::class);
    }

    public function bukti_transfer()
    {
        return $this->hasOne(BuktiTransfer::class);
    }
}
