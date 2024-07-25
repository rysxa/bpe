<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function m_products()
    {
        return $this->hasMany(Products::class, 'product_id', 'id');
    }

    public function m_product()
    {
        return $this->hasOne(Products::class, 'product_id', 'id');
    }
}
