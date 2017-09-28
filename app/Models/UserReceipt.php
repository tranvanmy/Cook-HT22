<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Receipt;
use App\Models\UserReceiptIngredient;
use App\Models\UserReceiptStep

class UserReceipt extends Model
{
    
    protected $fillable = [
        'assign_id',
        'receipt_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function receipt()
    {
    	return $this->belongsTo(Receipt::class);
    }

    public function userReceiptSteps()
    {
    	return $this->hasMany(UserReceiptStep::class);
    }

    public function userReceiptIngredients()
    {
    	return $this->hasMany(UserReceiptIngredient::class);
    }
    
}
