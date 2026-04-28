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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();

            $table->string('type');
            $table->string('strategy_key')->nullable(); // E.g., 'default', 'black_friday', 'flash_sale'
            $table->decimal('value', 10, 2)->nullable();

            $table->decimal('max_discount', 10, 2)->nullable();

            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->boolean('stackable')->default(false);
            $table->boolean('is_active')->default(true);

            $table->integer('priority')->default(0);

            $table->integer('usage_limit')->nullable();
            $table->integer('usage_count')->default(0);

            $table->timestamps();
        });

        Schema::create('promotion_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promotion_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('promotion_brands', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promotion_id')->constrained()->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_brands');
        Schema::dropIfExists('promotion_categories');
        Schema::dropIfExists('promotions');
    }
};
