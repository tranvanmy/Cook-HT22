<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserReceipt;

class UserReceiptStep extends Model
{
    
    protected $fillable = [
        'id',
        'user_receipt_id',
        'image',
        'content',
        'step'
    ];

    public function userReceipt()
    {
    	return $this->belongsTo(UserReceipt::class);
    }
    
}
