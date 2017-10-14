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
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Like;

class Receipt extends Model
{

    protected $fillable = [
        'name',
        'description',
        'rate_point',
        'image',
        'status',
        'role',
        'price',
        'user_id',
        'time',
        'ration',
        'complex'
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

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details');
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
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

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function foodies()
    {
        return $this->hasMany(Foody::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function scopeUserId($query, $id)
    {
        return $query->where("user_id", $id);
    }

    public function scopeStatus($query, $status)
    {
        return $query->where("status", $status);
    }

    public function scopeGetId($query, $id)
    {
        return $query->where("id", $id);
    }
}
