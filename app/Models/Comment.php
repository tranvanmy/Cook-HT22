<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Rate;

class Comment extends Model
{
    
    protected $fillable = [
        'user_id',
        'content',
        'rate_id'
    ];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }
}
