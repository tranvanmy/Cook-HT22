<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;
use App\Models\Rate;
use App\Models\Comment;
use App\Models\User;
use App\Models\UserReceipt;
use App\Models\ReceiptStep;
use App\Models\ReceiptIngredient;
use App\Models\Foody;
use App\Models\ReceiptFoody;
use App\Models\Level;

class Receipt extends Model
{
    
    protected $fillable = [
        'name',
        'description',
        'rate_point',
        'image',
        'status',
        'level_id',
        'price',
        'user_id'
    ];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userReceipts()
    {
        return $this->hasMany(UserReceipt::class);
    }

    public function receiptSteps()
    {
        return $this->hasMany(ReceiptStep::class);
    }

    public function receiptIngredients()
    {
        return $this->hasMany(ReceiptIngredient::class);
    }

    public function receiptFoodies()
    {
        return $this->hasMany(ReceiptFoody::class);
    }

    public function foodies()
    {
        return $this->hasMany(Foody::class);
    }
    
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    
}
