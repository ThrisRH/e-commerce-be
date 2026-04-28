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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_item_id')->constrained()->cascadeOnDelete();

            $table->string('sku')->unique();
            $table->string('image_url');
            $table->boolean('is_active')->default(true);
            $table->bigInteger('price');
            $table->integer('stock')->default(0);

            $table->boolean('is_default')->default(false);
            $table->float('weight')->default(0)->comment('kg');
            $table->float('length')->nullable()->comment('cm');
            $table->float('width')->nullable()->comment('cm');
            $table->float('height')->nullable()->comment('cm');

            $table->timestamps();
        });

        // Set the first variant of each product item as default
        $productItemIds = \Illuminate\Support\Facades\DB::table('product_variants')
            ->distinct()
            ->pluck('product_item_id');

        foreach ($productItemIds as $productItemId) {
            $firstVariantId = \Illuminate\Support\Facades\DB::table('product_variants')
                ->where('product_item_id', $productItemId)
                ->orderBy('id')
                ->value('id');

            if ($firstVariantId) {
                \Illuminate\Support\Facades\DB::table('product_variants')
                    ->where('id', $firstVariantId)
                    ->update(['is_default' => true]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
