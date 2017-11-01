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

    public function scopeFindFollow($query, $id_following, $id_follower)
    {
        return $query->where('following_id', $id_following)->where('follower_id', $id_follower)->first();
    }

    public function scopeGetIdFollower($query, $id_follower)
    {
        return $query->where("follower_id", $id_follower);
    }

    public function scopeGetAllFollowing($query, $id_following)
    {
        return $query->where("following_id", $id_following);
    }

    public function scopeGetBigger($query, $prop, $value)
    {
        return $query->where($prop, ">=", $value);
    }

    public function scopeOrderByDESC($query, $prop)
    {
        return $query->orderBy($prop, "DESC");
    }
}
