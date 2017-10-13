<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Receipt;

class Order extends Model
{

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'note',
        'user_id',
        'totalPrice',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function receipts()
    {
        return $this->belongsToMany(Receipt::class, 'order_details')->withPivot('quantity');
    }

    public function scopeSelectItem($query, $array = '')
    {
        return $query->select($array);
    }

    public function scopeOrderById($query, $prop)
    {
        return $query->orderBy($prop, 'DESC');
    }

}
