<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .header p {
            margin: 5px 0;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-weight: bold;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>Generated on: {{ $date }}</p>
        <p>Total Records: {{ $subscriptions->count() }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Company</th>
                <th>Plan</th>
                <th>Billing Cycle</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $subscription)
                <tr>
                    <td>{{ $subscription->company->name ?? '—' }}</td>
                    <td>{{ $subscription->plan->name ?? '—' }}</td>
                    <td>{{ ucfirst($subscription->billing_cycle) }}</td>
                    <td>{{ $subscription->currency }} {{ number_format($subscription->amount, 2) }}</td>
                    <td>{{ ucfirst($subscription->status) }}</td>
                    <td>{{ $subscription->start_date->format('Y-m-d') }}</td>
                    <td>{{ $subscription->end_date ? $subscription->end_date->format('Y-m-d') : '—' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>This report was generated automatically by the system.</p>
    </div>
</body>

</html>
