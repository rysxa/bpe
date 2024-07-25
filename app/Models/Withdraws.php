<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraws extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function m_product()
    {
        return $this->belongsTo(Products::class, 'product_id', 'id');
    }

    public function m_user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
