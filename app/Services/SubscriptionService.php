<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\SubscriptionTransaction;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class SubscriptionService
{
    /**
     * Get paginated list of subscriptions.
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Subscription::with(['company', 'plan'])
            ->latest()
            ->paginate($perPage);
    }

    /**
     * Get subscriptions for a specific company.
     */
    public function getCompanySubscriptions(Company $company, int $perPage = 15): LengthAwarePaginator
    {
        return Subscription::with(['plan'])
            ->where('company_id', $company->id)
            ->latest()
            ->paginate($perPage);
    }

    /**
     * Get a single subscription by ID.
     */
    public function findById(int $id): ?Subscription
    {
        return Subscription::with(['company', 'plan', 'transactions'])->find($id);
    }

    /**
     * Create a new subscription.
     */
    public function create(array $data): Subscription
    {
        return DB::transaction(function () use ($data) {
            $plan = Plan::findOrFail($data['plan_id']);

            // Determine amount based on billing cycle
            $amount = $data['billing_cycle'] === 'yearly'
                ? $plan->yearly_price
                : $plan->monthly_price;

            // Calculate end date
            $startDate = $data['start_date'];
            $endDate = $data['billing_cycle'] === 'yearly'
                ? $startDate->copy()->addYear()
                : $startDate->copy()->addMonth();

            $subscription = Subscription::create([
                'company_id' => $data['company_id'],
                'plan_id' => $data['plan_id'],
                'billing_cycle' => $data['billing_cycle'],
                'amount' => $amount,
                'currency' => $plan->currency ?? 'USD',
                'start_date' => $startDate,
                'end_date' => $endDate,
                'trial_ends_at' => $data['trial_ends_at'] ?? null,
                'status' => $data['status'] ?? 'active',
                'auto_renew' => $data['auto_renew'] ?? true,
                'stripe_subscription_id' => $data['stripe_subscription_id'] ?? null,
                'stripe_customer_id' => $data['stripe_customer_id'] ?? null,
            ]);

            // Create initial transaction if status is active
            if ($subscription->status === 'active') {
                SubscriptionTransaction::create([
                    'subscription_id' => $subscription->id,
                    'company_id' => $subscription->company_id,
                    'type' => 'subscription',
                    'amount' => $amount,
                    'currency' => $subscription->currency,
                    'status' => 'completed',
                    'paid_at' => now(),
                    'billing_period_start' => $startDate,
                    'billing_period_end' => $endDate,
                ]);
            }

            return $subscription->load(['company', 'plan', 'transactions']);
        });
    }

    /**
     * Update an existing subscription.
     */
    public function update(Subscription $subscription, array $data): Subscription
    {
        return DB::transaction(function () use ($subscription, $data) {
            // If plan or billing cycle changed, recalculate amount and dates
            if (isset($data['plan_id']) || isset($data['billing_cycle'])) {
                $plan = Plan::findOrFail($data['plan_id'] ?? $subscription->plan_id);
                $billingCycle = $data['billing_cycle'] ?? $subscription->billing_cycle;

                $data['amount'] = $billingCycle === 'yearly'
                    ? $plan->yearly_price
                    : $plan->monthly_price;

                if (isset($data['start_date'])) {
                    $startDate = $data['start_date'];
                    $data['end_date'] = $billingCycle === 'yearly'
                        ? $startDate->copy()->addYear()
                        : $startDate->copy()->addMonth();
                }
            }

            $subscription->update($data);

            return $subscription->load(['company', 'plan', 'transactions']);
        });
    }

    /**
     * Cancel a subscription.
     */
    public function cancel(Subscription $subscription, ?string $reason = null): Subscription
    {
        $subscription->update([
            'status' => 'canceled',
            'canceled_at' => now(),
            'cancel_reason' => $reason,
            'auto_renew' => false,
        ]);

        return $subscription->fresh();
    }

    /**
     * Create a transaction for a subscription.
     */
    public function createTransaction(array $data): SubscriptionTransaction
    {
        return SubscriptionTransaction::create($data);
    }

    /**
     * Get transactions for a subscription.
     */
    public function getTransactions(Subscription $subscription): \Illuminate\Database\Eloquent\Collection
    {
        return SubscriptionTransaction::where('subscription_id', $subscription->id)
            ->latest()
            ->get();
    }

    /**
     * Delete a subscription (soft delete).
     */
    public function delete(Subscription $subscription): bool
    {
        return $subscription->delete();
    }
}
