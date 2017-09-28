<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Receipt;

class Level extends Model
{
    
    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    public function users()
    {
    	return $this->hasMany(User::class);
    }
    
    public function receipts()
    {
    	return $this->hasMany(Receipt::class);
    }
    
}
