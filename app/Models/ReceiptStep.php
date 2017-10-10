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
    public $timestamps = false;

    public function receipt()
    {
    	return $this->belongsTo(Receipt::class);
    }

    public function scopeReceiptId($query, $id)
    {
    	return $query->where("receipt_id", $id);
    }
    
}
