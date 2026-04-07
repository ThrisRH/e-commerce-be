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
        Schema::table('products', function (Blueprint $table) {
            $table->bigInteger('price')->change();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('total_amount')->change();
            $table->bigInteger('shipping_fee')->default(0)->change();
        });

        Schema::table('promotions', function (Blueprint $table) {
            $table->bigInteger('value')->nullable()->change();
            $table->bigInteger('max_discount')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('price', 15, 2)->change();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('total_amount', 15, 2)->change();
            $table->decimal('shipping_fee', 15, 2)->default(0)->change();
        });

        Schema::table('promotions', function (Blueprint $table) {
            $table->decimal('value', 15, 2)->nullable()->change();
            $table->decimal('max_discount', 15, 2)->nullable()->change();
        });
    }
};
