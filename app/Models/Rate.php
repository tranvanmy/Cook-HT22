<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Receipt;
use App\Models\User;
use App\Models\Comment;
class Rate extends Model
{

    protected $fillable = [
        'id',
        'user_id',
        'point',
        'receipt_id',
        'content'
    ];

    public function receipt()
    {
    	return $this->belongsTo(Receipt::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function scopeReceiptId($query, $id)
    {
        return $query->where("receipt_id",$id);
    }

    public function scopeFindRateByUser($query, $receipt_id, $user_id)
    {
        return $query->where("receipt_id", $receipt_id)->where("user_id", $user_id)->first();
    }
}
