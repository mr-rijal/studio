<?php

namespace App\Models;

use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyAddress extends Model
{
    use HasCompany, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'family_id',
        'home_address',
        'city',
        'state',
        'zip',
    ];

    /**
     * Get the family that owns the address.
     */
    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }
}
