<?php

use App\Ship\Enums\OrderStatus;
use App\Ship\Enums\PaymentStatus;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->decimal('total_amount', 10, 2);
            $table->decimal('shipping_fee', 10, 2)->default(0);

            $table->string('status')->default(OrderStatus::Pending->value);

            $table->string('shipping_name');
            $table->string('shipping_phone');
            $table->text('shipping_address');

            $table->string('payment_method')->nullable()->default('COD');
            $table->string('payment_status')->default(PaymentStatus::Pending->value);
            $table->string('transaction_id')->nullable();

            $table->text('note')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
