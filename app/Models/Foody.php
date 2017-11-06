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

    public function receiptFoodies()
    {
        return $this->hasMany(ReceiptFoody::class);
    }

    public function scopeParentID($query, $parent_id)
    {
        return $query->where("parent_id", $parent_id);
    }

    public function childs()
    {
        return $this->hasMany(Foody::class, 'parent_id', 'id');
    }
    
}
