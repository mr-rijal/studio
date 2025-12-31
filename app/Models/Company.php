<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'logo',
        'user_id',
        'phone_number',
        'mobile_number',
        'organization_type',
        'fax_number',
        'email',
        'replyto_email',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'zip',
        'taxid_label',
        'tax_number',
        'tuition_fee_taxable',
        'registration_fee_taxable',
        'tax_rate',
        'tax_label',
        'send_enrollment_email_to_instructor',
        'email_to_receive_notification',
        'date_format',
        'min_age_of_child',
        'discount_for_many_kids',
        'with_many_kids_discount',
        'can_pay_full_year',
        'full_year_discount',
        'charge_reg_fee_old',
        'old_when_to_charge_fee',
        'old_amount_student_1',
        'old_amount_student_2',
        'old_amount_student_3',
        'old_amount_student_n',
        'charge_reg_fee_new',
        'new_when_to_charge_fee',
        'new_amount_student_1',
        'new_amount_student_2',
        'new_amount_student_3',
        'new_amount_student_n',
        'new_amount_per_family',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'tuition_fee_taxable' => 'boolean',
            'registration_fee_taxable' => 'boolean',
            'tax_rate' => 'decimal:2',
            'send_enrollment_email_to_instructor' => 'boolean',
            'min_age_of_child' => 'integer',
            'discount_for_many_kids' => 'boolean',
            'with_many_kids_discount' => 'decimal:2',
            'can_pay_full_year' => 'boolean',
            'full_year_discount' => 'decimal:2',
            'charge_reg_fee_old' => 'boolean',
            'old_when_to_charge_fee' => 'integer',
            'old_amount_student_1' => 'decimal:2',
            'old_amount_student_2' => 'decimal:2',
            'old_amount_student_3' => 'decimal:2',
            'old_amount_student_n' => 'decimal:2',
            'charge_reg_fee_new' => 'boolean',
            'new_when_to_charge_fee' => 'integer',
            'new_amount_student_1' => 'decimal:2',
            'new_amount_student_2' => 'decimal:2',
            'new_amount_student_3' => 'decimal:2',
            'new_amount_student_n' => 'decimal:2',
            'new_amount_per_family' => 'decimal:2',
            'status' => 'boolean',
        ];
    }

    /**
     * Get the user that owns the company.
     * 
     * Note: This relationship does not have a database foreign key constraint
     * because users are stored in tenant schemas (e.g., "schema_name"."users")
     * while companies are stored in the public schema. PostgreSQL doesn't
     * allow foreign key constraints across different schemas.
     * The relationship is enforced in application code.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the domains for the company.
     */
    public function domains(): HasMany
    {
        return $this->hasMany(Domain::class);
    }

    /**
     * Get the primary domain for the company.
     */
    public function domain(): HasOne
    {
        return $this->hasOne(Domain::class)->where('primary', true)->where('status', true);
    }

    /**
     * Get the subscriptions for the company.
     */
    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    /**
     * Get the active subscription for the company.
     */
    public function activeSubscription(): HasOne
    {
        return $this->hasOne(Subscription::class)->where('status', 'active')->latest();
    }

    /**
     * Get the subscription transactions for the company.
     */
    public function subscriptionTransactions(): HasMany
    {
        return $this->hasMany(SubscriptionTransaction::class);
    }
}
