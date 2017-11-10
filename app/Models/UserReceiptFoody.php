<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserReceipt;
use App\Models\Foody;

class UserReceiptFoody extends Model
{
    protected $fillable = [
        'foody_id',
        'user_receipt_id',
    ];

    public function userReceipt()
    {
        return $this->belongsTo(UserReceipt::class);
    }

    public function foody()
    {
        return $this->belongsTo(Foody::class);
    }
}
