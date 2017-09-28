<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Receipt;

class ReceiptStep extends Model
{
    
    protected $fillable = [
        'receipt_id',
        'detail'
        ];

    public function receipt()
    {
    	return $this->belongsTo(Receipt::class);
    }
    
}
