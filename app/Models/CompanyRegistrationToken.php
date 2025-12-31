<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CompanyRegistrationToken extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'token',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function generateToken()
    {
        $this->token = Str::random(32);
        $this->expires_at = now()->addHours(24);
        $this->save();
        return $this->token;
    }

    public function expired()
    {
        return $this->expires_at->isPast();
    }
}
