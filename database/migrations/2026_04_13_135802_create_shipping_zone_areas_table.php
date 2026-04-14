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
        Schema::create('shipping_zone_areas', function (Blueprint $blueprint) {
            $blueprint->id();

            $blueprint->foreignId('shipping_zone_id')->constrained('shipping_zones')->onDelete('cascade');
            $blueprint->string('province');
            $blueprint->string('distince');
            $blueprint->string('ward')->nullable();

            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_zone_areas');
    }
};
