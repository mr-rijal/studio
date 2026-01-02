<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Domain;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::create([
            'company_id' => random_int(111111, 99999999),
            'name' => 'Company Demo',
            'phone_number' => '1234567890',
            'mobile_number' => '1234567890',
            'organization_type' => 'dance',
            'fax_number' => '1234567890',
            'email' => 'company1@example.com',
            'replyto_email' => 'replyto@example.com',
            'address_line_1' => '123 Main St',
            'address_line_2' => 'Suite 100',
            'city' => 'Los Angeles',
            'state' => 'CA',
            'zip' => '90210',
            'taxid_label' => 'TAX ID',
            'tax_label' => 'TAX',
        ]);
        Domain::create([
            'company_id' => $company->id,
            'domain' => 'a.localhost',
            'status' => 1,
        ]);
    }
}
