<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiTransfer extends Model
{
    use HasFactory;
    protected $table = 'bukti_transfer';
    protected $fillable = ['user_id', 'foto'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
