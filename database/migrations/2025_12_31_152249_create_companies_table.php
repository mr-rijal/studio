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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('phone_number', 15)->nullable();
            $table->string('mobile_number', 15)->nullable();
            $table->string('organization_type', 50)->nullable();
            $table->string('fax_number', 15)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('replyto_email', 100)->nullable();
            $table->string('address_line_1', 240)->nullable();
            $table->string('address_line_2', 240)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('taxid_label', 50)->nullable();
            $table->string('tax_number', 50)->nullable();
            $table->boolean('tuition_fee_taxable')->default(false);
            $table->boolean('registration_fee_taxable')->default(false);
            $table->decimal('tax_rate', 8, 2)->nullable();
            $table->string('tax_label', 50)->nullable();
            $table->boolean('send_enrollment_email_to_instructor')->default(false);
            $table->string('email_to_receive_notification')->nullable();
            $table->string('date_format')->nullable();
            $table->integer('min_age_of_child')->nullable();
            $table->boolean('discount_for_many_kids')->default(false);
            $table->decimal('with_many_kids_discount', 8, 2)->nullable();
            $table->boolean('can_pay_full_year')->default(false);
            $table->decimal('full_year_discount', 8, 2)->nullable();
            $table->boolean('charge_reg_fee_old')->default(false);
            $table->integer('old_when_to_charge_fee')->nullable();
            $table->decimal('old_amount_student_1', 8, 2)->nullable();
            $table->decimal('old_amount_student_2', 8, 2)->nullable();
            $table->decimal('old_amount_student_3', 8, 2)->nullable();
            $table->decimal('old_amount_student_n', 8, 2)->nullable();
            $table->boolean('charge_reg_fee_new')->default(false);
            $table->integer('new_when_to_charge_fee')->nullable();
            $table->decimal('new_amount_student_1', 8, 2)->nullable();
            $table->decimal('new_amount_student_2', 8, 2)->nullable();
            $table->decimal('new_amount_student_3', 8, 2)->nullable();
            $table->decimal('new_amount_student_n', 8, 2)->nullable();
            $table->decimal('new_amount_per_family', 8, 2)->nullable();
            $table->boolean('status')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
