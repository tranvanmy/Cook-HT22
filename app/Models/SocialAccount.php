<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SocialAccount extends Model
{

    protected $fillable = [
        'social_id',
        'social_type',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSocialID($query, $id)
    {
        return $query->where("social_id", $id);
    }

    public function scopeSocialType($query, $type)
    {
        return $query->where("social_type", $type);
    }
}
