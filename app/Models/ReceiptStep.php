<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Receipt;

class ReceiptStep extends Model
{
    
    protected $fillable = [
        'receipt_id',
        'content',
        'image',
        'step'
        ];
    public $timestamps = false;

    public function receipt()
    {
    	return $this->belongsTo(Receipt::class);
    }
}
