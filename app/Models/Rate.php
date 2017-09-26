<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Receipt;
use App\Models\User;
class Rate extends Model
{
    //
    protected $fillable = [
        'id',
        'user_id',
        'point'
    ];

    public function receipt()
    {
    	return $this->belongsTo(Receipt::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
}
