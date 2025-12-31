<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
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
            'company_id' => ['required', 'exists:companies,id'],
            'plan_id' => ['required', 'exists:plans,id'],
            'billing_cycle' => ['required', 'in:monthly,yearly'],
            'start_date' => ['required', 'date'],
            'trial_ends_at' => ['nullable', 'date', 'after:start_date'],
            'status' => ['nullable', 'in:active,canceled,expired,suspended,trial'],
            'auto_renew' => ['nullable', 'boolean'],
            'stripe_subscription_id' => ['nullable', 'string', 'max:255'],
            'stripe_customer_id' => ['nullable', 'string', 'max:255'],
        ];
    }
}
