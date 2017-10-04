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

    public function scopeGetID($query, $id)
    {
        return $query->find($id);
    }

    public function scopeParentID($query, $parent_id)
    {
        return $query->where("parent_id", $parent_id);
    }
    
}
