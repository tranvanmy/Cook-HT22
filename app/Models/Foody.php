<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Foody;

class Foody extends Model
{
    
    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'status'
    ];

    public function receiptFoody()
    {
    	return $this->hasMany(Foody::class);
    }
    
}
