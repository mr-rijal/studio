<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subscription_id' => ['required', 'exists:subscriptions,id'],
            'type' => ['required', 'in:subscription,renewal,upgrade,downgrade,refund,payment_failed'],
            'amount' => ['required', 'numeric', 'min:0'],
            'currency' => ['nullable', 'string', 'max:3'],
            'status' => ['nullable', 'in:pending,completed,failed,refunded,cancelled'],
            'payment_method' => ['nullable', 'string', 'max:255'],
            'transaction_id' => ['nullable', 'string', 'max:255', 'unique:subscription_transactions,transaction_id'],
            'stripe_payment_intent_id' => ['nullable', 'string', 'max:255'],
            'stripe_invoice_id' => ['nullable', 'string', 'max:255'],
            'billing_period_start' => ['nullable', 'date'],
            'billing_period_end' => ['nullable', 'date', 'after:billing_period_start'],
            'notes' => ['nullable', 'string'],
            'paid_at' => ['nullable', 'date'],
        ];
    }
}
