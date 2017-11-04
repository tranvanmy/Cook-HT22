<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Follow extends Model
{

    protected $fillable = [
        'id',
        'following_id',
        'follower_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'following_id');
    }

    public function userFollow()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }
}
