<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;
use App\Models\Receipt;

class ReceiptIngredient extends Model
{
    
    protected $fillable = [
        'ingredient_id',
        'receipt_id',
        'quantity',
        'note'
    ];

    public function ingredient()
    {
    	return $this->belongsTo(Ingredient::class);
    }

    public function receipt()
    {
    	return $this->belongsTo(Receipt::class);
    }
}
