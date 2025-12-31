<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionRequest extends FormRequest
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
            'plan_id' => ['sometimes', 'required', 'exists:plans,id'],
            'billing_cycle' => ['sometimes', 'required', 'in:monthly,yearly'],
            'start_date' => ['sometimes', 'required', 'date'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
            'trial_ends_at' => ['nullable', 'date', 'after:start_date'],
            'status' => ['nullable', 'in:active,canceled,expired,suspended,trial'],
            'auto_renew' => ['nullable', 'boolean'],
            'cancel_reason' => ['nullable', 'string'],
            'stripe_subscription_id' => ['nullable', 'string', 'max:255'],
            'stripe_customer_id' => ['nullable', 'string', 'max:255'],
        ];
    }
}
