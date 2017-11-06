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
}
