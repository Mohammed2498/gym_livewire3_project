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
            $table->unsignedBigInteger('subscriber_id');
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->decimal('subscription_price', 10, 2);
            $table->enum('subtype', ['custom', 'specified']);
            $table->enum('sport_type', ['body_building', 'fitness'])->nullable();
            $table->integer('duration')->default(1);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'expired'])->nullable();
            $table->timestamps();
            $table->foreign('subscriber_id')->references('id')->on('subscribers')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
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
