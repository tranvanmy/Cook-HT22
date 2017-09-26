<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Receipt;
class Comment extends Model
{
    //
    protected $fillable = [
        'user_id',
        'content',
        'parent_id',
        'receipt_id'
    ];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function receipt()
    {
    	return $this->belongsTo(Receipt::class);
    }
    
}
