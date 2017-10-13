<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderDetail extends Model
{
    
    protected $fillable = [
        'id',
        'receipt_id',
        'order_id',
        'quantity'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function receipt()
    {
        return $this->belongsTo(Receipt::class);
    }
    
}
