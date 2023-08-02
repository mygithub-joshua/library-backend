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
        Schema::create('transactions_table', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id');
            $table->text('address')->nullable();
            $table->float('total_price')->nullable();
            $table->float('shipping_price')->nullable();
            $table->string('status')->default('PENDING');
            $table->string('payment')->default('MANUAL');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions_table');
    }
};
