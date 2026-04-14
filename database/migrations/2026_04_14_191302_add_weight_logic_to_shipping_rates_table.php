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
        Schema::table('shipping_rates', function (Blueprint $table) {
            $table->float('base_weight')->default(2)->after('base_fee')->comment('kg');
            $table->float('step_weight')->default(0.5)->after('base_weight')->comment('kg');
            $table->bigInteger('step_fee')->default(0)->after('step_weight');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shipping_rates', function (Blueprint $table) {
            $table->dropColumn(['base_weight', 'step_weight', 'step_fee']);
        });
    }
};
