<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferalUsing extends Model
{
    use HasFactory;
    protected $table = "referal_using";
    protected $fillable = [
        'user_id',
        'referral_id',
        'using_by',
    ];
    public function user()
    {
        // relasi many to one dengan table user
        return $this->belongsTo(User::class);
    }
    public function referral()
    {
        return $this->belongsTo(Referral::class);
    }
}
