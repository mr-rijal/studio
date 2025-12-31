<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'plan_id',
        'billing_cycle',
        'amount',
        'currency',
        'start_date',
        'end_date',
        'trial_ends_at',
        'status',
        'canceled_at',
        'cancel_reason',
        'stripe_subscription_id',
        'stripe_customer_id',
        'auto_renew',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'trial_ends_at' => 'date',
            'canceled_at' => 'datetime',
            'amount' => 'decimal:2',
            'auto_renew' => 'boolean',
        ];
    }

    /**
     * Get the company that owns the subscription.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the plan for the subscription.
     */
    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * Get the transactions for the subscription.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(SubscriptionTransaction::class);
    }
}
