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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->foreignId('plan_id')->constrained('plans')->onDelete('restrict');
            $table->enum('billing_cycle', ['monthly', 'yearly'])->default('monthly');
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->date('trial_ends_at')->nullable();
            $table->enum('status', ['active', 'canceled', 'expired', 'suspended', 'trial'])->default('active');
            $table->timestamp('canceled_at')->nullable();
            $table->text('cancel_reason')->nullable();
            $table->string('stripe_subscription_id')->nullable();
            $table->string('stripe_customer_id')->nullable();
            $table->boolean('auto_renew')->default(true);
            $table->softDeletes();
            $table->timestamps();

            $table->index(['company_id', 'status']);
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
