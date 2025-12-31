<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanRequest extends FormRequest
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
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'required', 'string'],
            'monthly_price' => ['sometimes', 'required', 'numeric', 'min:0'],
            'yearly_price' => ['sometimes', 'required', 'numeric', 'min:0'],
            'monthly_stripe_price_id' => ['nullable', 'string', 'max:255'],
            'yearly_stripe_price_id' => ['nullable', 'string', 'max:255'],
            'currency' => ['sometimes', 'required', 'string', 'max:3'],
            'features' => ['nullable', 'array'],
            'features.*' => ['nullable', 'string'],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['nullable', 'string'],
            'status' => ['nullable', 'boolean'],
        ];
    }
}
