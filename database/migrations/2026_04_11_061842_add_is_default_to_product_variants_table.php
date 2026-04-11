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
        Schema::table('product_variants', function (Blueprint $table) {
            $table->boolean('is_default')->default(false)->after('is_active');
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
        Schema::table('product_variants', function (Blueprint $table) {
            $table->dropColumn('is_default');
        });
    }
};
