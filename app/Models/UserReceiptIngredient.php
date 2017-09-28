<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UserReceipt;
use App\Models\Ingredient;

class UserReceiptIngredient extends Model
{
    
    protected $fillable = [
        'id',
        'user_id',
        'user_receipt_id',
        'detail'
    ];

    public function userReceipt()
    {
    	return $this->belongsTo(UserReceipt::class);
    }

    public function ingredient()
    {
    	return $this->belongsTo(Ingredient::class);
    }
    
}
