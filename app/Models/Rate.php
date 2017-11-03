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
}
