<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function m_roles()
    {
        return $this->hasMany(Roles::class, 'role_id', 'id');
    }

    public function m_role()
    {
        return $this->hasOne(Roles::class, 'role_id', 'id');
    }

}
