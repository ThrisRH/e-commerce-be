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
        if (! Schema::hasTable('shipping_methods')) {
            Schema::create('shipping_methods', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->float('time_coefficient')->default(1);
                $table->float('distance_coefficient')->default(1);
                $table->integer('volumetric_divisor')->default(5000)->comment('Used to calculate volumetric weight');
                $table->float('max_weight')->default(0); // kg
                $table->float('max_volume')->default(0); // m3
                $table->timestamps();
            });
        }

        Schema::create('shipping_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('shipping_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('shipping_areas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->nullable()->constrained('shipping_cities')->onDelete('set null');
            $table->foreignId('province_id')->nullable()->constrained('shipping_provinces')->onDelete('set null');
            $table->string('level_code')->nullable(); // Can be used to group areas into zones
            $table->timestamps();
        });

        Schema::create('shipping_zone_levels', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('priority')->default(0); // 10, 20, 30...
            $table->timestamps();
        });

        Schema::create('shipping_routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('start_id')->constrained('shipping_areas')->onDelete('cascade');
            $table->foreignId('end_id')->constrained('shipping_areas')->onDelete('cascade');
            $table->decimal('cost', 15, 2)->default(0);
            $table->string('level_code')->nullable(); // Optional: to classify routes
            $table->timestamps();

            // Ensure unique routes between areas
            $table->unique(['start_id', 'end_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_routes');
        Schema::dropIfExists('shipping_zone_levels');
        Schema::dropIfExists('shipping_areas');
        Schema::dropIfExists('shipping_provinces');
        Schema::dropIfExists('shipping_cities');
        Schema::dropIfExists('shipping_methods');
    }
};
