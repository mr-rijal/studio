<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SubscriptionsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $subscriptions;

    public function __construct($subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }

    public function collection()
    {
        return $this->subscriptions;
    }

    public function headings(): array
    {
        return [
            'Company',
            'Plan',
            'Billing Cycle',
            'Amount',
            'Status',
            'Start Date',
            'End Date',
        ];
    }

    public function map($subscription): array
    {
        return [
            $subscription->company->name ?? '—',
            $subscription->plan->name ?? '—',
            ucfirst($subscription->billing_cycle),
            $subscription->currency.' '.number_format($subscription->amount, 2),
            ucfirst($subscription->status),
            $subscription->start_date->format('Y-m-d'),
            $subscription->end_date ? $subscription->end_date->format('Y-m-d') : '—',
        ];
    }
}
