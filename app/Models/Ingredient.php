<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Receipt;
use App\Models\ReceiptIngredient;
use App\Models\UserReceiptIngredient;
class Ingredient extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'image',
        'unit',
        'category_id'
    ];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function receipts()
    {
    	return $this->hasMany(Receipt::class);
    }

    public function receiptIngredients()
    {
        return $this->hasMany(ReceiptIngredient::class);
    }

    public function userReceiptIngredient()
    {
        return $this->hasOne(UserReceiptIngredient::class);
    }
    
}
