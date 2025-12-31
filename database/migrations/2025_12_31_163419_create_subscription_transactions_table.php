<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscription_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_id')->constrained('subscriptions')->onDelete('cascade');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->enum('type', ['subscription', 'renewal', 'upgrade', 'downgrade', 'refund', 'payment_failed'])->default('subscription');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded', 'cancelled'])->default('pending');
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable()->unique();
            $table->string('stripe_payment_intent_id')->nullable();
            $table->string('stripe_invoice_id')->nullable();
            $table->date('billing_period_start')->nullable();
            $table->date('billing_period_end')->nullable();
            $table->text('notes')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index(['subscription_id', 'status']);
            $table->index(['company_id', 'status']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_transactions');
    }
};
