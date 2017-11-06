<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Receipt;
use App\Models\UserReceiptIngredient;
use App\Models\UserReceiptStep;
use App\Models\UserReceiptFoody;

class UserReceipt extends Model
{
    
    protected $fillable = [
        'user_id',
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

    public function userReceiptFoodies()
    {
        return $this->hasMany(UserReceiptFoody::class);
    }
    
}
