<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Foody;
use App\Models\Receipt;

class ReceiptFoody extends Model
{
    protected $primaryKey = 'receipt_id';

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

    public function scopeReceiptId($query, $id)
    {
        return $query->where("receipt_id", $id);
    }

    public function scopeOrderByDESC($query, $prop)
    {
        return $query->orderBy($prop, 'DESC');
    }
}
