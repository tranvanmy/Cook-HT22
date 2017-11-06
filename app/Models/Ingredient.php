<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Receipt;
use App\Models\ReceiptIngredient;
use App\Models\UserReceiptIngredient;
use App\Models\Unit;

class Ingredient extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'unit',
        'category_id',
        'status',
        'unit_id'
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

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function userReceiptIngredient()
    {
        return $this->hasOne(UserReceiptIngredient::class);
    }
}
