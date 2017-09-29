<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;

class Category extends Model
{

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'status'
    ];

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }

    public function scopeGetID($query, $id)
    {
        return $query->find($id);
    }

    public function scopeParentID($query, $parent_id)
    {
        return $query->where("parent_id", $parent_id);
    }
}
