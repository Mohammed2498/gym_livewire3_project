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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_id');
            $table->decimal('payment_amount', 10, 2);
            $table->decimal('remaining_payment', 10, 2);
            $table->enum('payment_status', ['full', 'partial', 'not_paid']);
            $table->timestamps();
            $table->foreign('subscription_id')->references('id')
                ->on('subscriptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
