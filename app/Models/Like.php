<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Receipt;
use App\Models\User;

class Like extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'receipt_id',
        'status'
    ];

    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGetUser($query, $user_id, $receipt_id)
    {
        return $query->where("user_id", $user_id)->where("receipt_id", $receipt_id);
    }

    public function scopeFindLike($query, $receipt_id, $user_id)
    {
        return $query->where('receipt_id', $receipt_id)->where('user_id', $user_id)->first();
    }
}
