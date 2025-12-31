<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'guard',
        'permissions',
        'status',
    ];

    protected $casts = [
        'permissions' => 'array',
    ];
}
