<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\StoreSubscriptionTransactionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\Company;
use App\Models\Plan;
use App\Models\Subscription;
use App\Services\SubscriptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubscriptionController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(
        protected SubscriptionService $subscriptionService
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $subscriptions = $this->subscriptionService->paginate();

        return view('superadmin.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show subscriptions for a specific company.
     */
    public function companySubscriptions(Company $company): View
    {
        $subscriptions = $this->subscriptionService->getCompanySubscriptions($company);

        return view('superadmin.subscriptions.company', compact('company', 'subscriptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubscriptionRequest $request): JsonResponse|RedirectResponse
    {
        $data = $request->validated();

        // Convert date strings to Carbon instances
        $data['start_date'] = \Carbon\Carbon::parse($data['start_date']);
        if (isset($data['trial_ends_at'])) {
            $data['trial_ends_at'] = \Carbon\Carbon::parse($data['trial_ends_at']);
        }

        $subscription = $this->subscriptionService->create($data);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Subscription created successfully.',
                'subscription' => $subscription->load(['plan', 'company']),
            ]);
        }

        return redirect()
            ->route('s.companies.show', $subscription->company_id)
            ->with('success', 'Subscription created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription): View
    {
        $subscription = $this->subscriptionService->findById($subscription->id);

        if (! $subscription) {
            abort(404);
        }

        $transactions = $this->subscriptionService->getTransactions($subscription);

        return view('superadmin.subscriptions.show', compact('subscription', 'transactions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionRequest $request, Subscription $subscription): JsonResponse|RedirectResponse
    {
        $data = $request->validated();

        // Convert date strings to Carbon instances if provided
        if (isset($data['start_date'])) {
            $data['start_date'] = \Carbon\Carbon::parse($data['start_date']);
        }
        if (isset($data['end_date'])) {
            $data['end_date'] = \Carbon\Carbon::parse($data['end_date']);
        }
        if (isset($data['trial_ends_at'])) {
            $data['trial_ends_at'] = \Carbon\Carbon::parse($data['trial_ends_at']);
        }

        $subscription = $this->subscriptionService->update($subscription, $data);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Subscription updated successfully.',
                'subscription' => $subscription->load(['plan', 'company']),
            ]);
        }

        return redirect()
            ->route('s.companies.show', $subscription->company_id)
            ->with('success', 'Subscription updated successfully.');
    }

    /**
     * Cancel a subscription.
     */
    public function cancel(Request $request, Subscription $subscription): JsonResponse|RedirectResponse
    {
        $request->validate([
            'cancel_reason' => ['nullable', 'string', 'max:500'],
        ]);

        $subscription = $this->subscriptionService->cancel($subscription, $request->cancel_reason);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Subscription canceled successfully.',
                'subscription' => $subscription->load(['plan', 'company']),
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Subscription canceled successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription): RedirectResponse
    {
        $companyId = $subscription->company_id;

        $this->subscriptionService->delete($subscription);

        return redirect()
            ->route('s.companies.show', $companyId)
            ->with('success', 'Subscription deleted successfully.');
    }

    /**
     * Store a transaction for a subscription.
     */
    public function storeTransaction(StoreSubscriptionTransactionRequest $request): JsonResponse|RedirectResponse
    {
        $data = $request->validated();
        $data['company_id'] = Subscription::find($data['subscription_id'])->company_id;

        // Convert date strings to Carbon instances if provided
        if (isset($data['billing_period_start'])) {
            $data['billing_period_start'] = \Carbon\Carbon::parse($data['billing_period_start']);
        }
        if (isset($data['billing_period_end'])) {
            $data['billing_period_end'] = \Carbon\Carbon::parse($data['billing_period_end']);
        }
        if (isset($data['paid_at'])) {
            $data['paid_at'] = \Carbon\Carbon::parse($data['paid_at']);
        }

        $transaction = $this->subscriptionService->createTransaction($data);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Transaction created successfully.',
                'transaction' => $transaction,
            ]);
        }

        return redirect()
            ->back()
            ->with('success', 'Transaction created successfully.');
    }
}
