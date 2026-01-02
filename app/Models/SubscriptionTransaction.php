<?php

namespace App\Models;

use App\Traits\HasCompany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionTransaction extends Model
{
    use HasCompany, HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'subscription_id',
        'company_id',
        'type',
        'amount',
        'currency',
        'status',
        'payment_method',
        'transaction_id',
        'stripe_payment_intent_id',
        'stripe_invoice_id',
        'billing_period_start',
        'billing_period_end',
        'notes',
        'metadata',
        'paid_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'billing_period_start' => 'date',
            'billing_period_end' => 'date',
            'paid_at' => 'datetime',
            'metadata' => 'array',
        ];
    }

    /**
     * Get the subscription that owns the transaction.
     */
    public function subscription(): BelongsTo
    {
        return $this->belongsTo(Subscription::class);
    }

    /**
     * Get the company that owns the transaction.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
