<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'user_id' => ['sometimes', 'required', 'exists:users,id'],
            'phone_number' => ['nullable', 'string', 'max:15'],
            'mobile_number' => ['nullable', 'string', 'max:15'],
            'organization_type' => ['nullable', 'string', 'max:50'],
            'fax_number' => ['nullable', 'string', 'max:15'],
            'email' => ['nullable', 'email', 'max:100'],
            'replyto_email' => ['nullable', 'email', 'max:100'],
            'address_line_1' => ['nullable', 'string', 'max:240'],
            'address_line_2' => ['nullable', 'string', 'max:240'],
            'city' => ['nullable', 'string', 'max:50'],
            'state' => ['nullable', 'string', 'max:50'],
            'zip' => ['nullable', 'string', 'max:10'],
            'taxid_label' => ['nullable', 'string', 'max:50'],
            'tax_number' => ['nullable', 'string', 'max:50'],
            'tuition_fee_taxable' => ['nullable', 'boolean'],
            'registration_fee_taxable' => ['nullable', 'boolean'],
            'tax_rate' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'tax_label' => ['nullable', 'string', 'max:50'],
            'send_enrollment_email_to_instructor' => ['nullable', 'boolean'],
            'email_to_receive_notification' => ['nullable', 'email', 'max:255'],
            'date_format' => ['nullable', 'string', 'max:50'],
            'min_age_of_child' => ['nullable', 'integer', 'min:0'],
            'discount_for_many_kids' => ['nullable', 'boolean'],
            'with_many_kids_discount' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'can_pay_full_year' => ['nullable', 'boolean'],
            'full_year_discount' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'charge_reg_fee_old' => ['nullable', 'boolean'],
            'old_when_to_charge_fee' => ['nullable', 'integer', 'min:0'],
            'old_amount_student_1' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'old_amount_student_2' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'old_amount_student_3' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'old_amount_student_n' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'charge_reg_fee_new' => ['nullable', 'boolean'],
            'new_when_to_charge_fee' => ['nullable', 'integer', 'min:0'],
            'new_amount_student_1' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'new_amount_student_2' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'new_amount_student_3' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'new_amount_student_n' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'new_amount_per_family' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'status' => ['nullable', 'boolean'],
            'domains' => ['nullable', 'array'],
            'domains.*.domain' => ['required_with:domains', 'string', 'max:255'],
            'domains.*.primary' => ['nullable', 'boolean'],
            'domains.*.status' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $domains = $this->input('domains', []);

            if (! empty($domains)) {
                $primaryCount = 0;
                foreach ($domains as $index => $domain) {
                    if (isset($domain['primary']) && $domain['primary']) {
                        $primaryCount++;
                    }
                }

                if ($primaryCount > 1) {
                    $validator->errors()->add(
                        'domains',
                        __('Only one domain can be set as primary.')
                    );
                }
            }
        });
    }
}
