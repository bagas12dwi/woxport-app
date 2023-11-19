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
            $table->string('order_number');
            $table->foreignId('vendor_id')
                ->nullable()
                ->constrained('vendors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('total_price');
            $table->string('proof_of_payment')->nullable();
            $table->string('status');
            $table->text('address')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
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
