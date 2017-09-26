<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Follow extends Model
{
    //
    protected $fillable = [
        'following_id',
        'follower_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
}
