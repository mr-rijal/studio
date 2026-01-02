<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CompaniesExport implements FromCollection, WithHeadings, WithMapping
{
    protected $companies;

    public function __construct($companies)
    {
        $this->companies = $companies;
    }

    public function collection()
    {
        return $this->companies;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Phone',
            'Status',
            'Created At',
            'Owner',
        ];
    }

    public function map($company): array
    {
        return [
            $company->name,
            $company->email ?? '—',
            $company->phone_number ?? '—',
            $company->status ? 'Active' : 'Inactive',
            $company->created_at->format('Y-m-d H:i:s'),
            $company->user ? $company->user->name : '—',
        ];
    }
}
