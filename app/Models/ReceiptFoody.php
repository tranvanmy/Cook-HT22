<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Foody;
use App\Models\Receipt;

class ReceiptFoody extends Model
{
    
    protected $fillable = [
        'receipt_id',
        'foody_id'
    ];

    public function foody()
    {
    	return $this->belongsTo(Foody::class);
    }

    public function receipt()
    {
    	return $this->belongsTo(Receipt::class);
    }
    
}
