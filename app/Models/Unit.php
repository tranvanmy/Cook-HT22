<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;

class Unit extends Model
{

    protected $fillable = [
        'id',
        'name',
    ];
    public $timestamps = false;

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
