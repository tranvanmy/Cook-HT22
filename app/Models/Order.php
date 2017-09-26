<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderDetail;
class Order extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'note',
        'user_id',
        'total',
        'status',
        'seller',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    
}
