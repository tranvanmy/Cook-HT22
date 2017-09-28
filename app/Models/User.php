<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Comment;
use App\Models\Rate;
use App\Models\Follow;
use App\Models\SocialAccount;
use App\Models\Order;
use App\Models\Receipt;
use App\Models\UserReceipt;
use App\Models\Level;

class User extends Authenticatable
{
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'level_id',
        'avatar',
        'status',
        'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function follows()
    {
        return $this->hasMany(Follow::class);
    }

    public function socialAccounts()
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
    
    public function userReceipts()
    {
        return $this->hasMany(UserReceipt::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    
}
