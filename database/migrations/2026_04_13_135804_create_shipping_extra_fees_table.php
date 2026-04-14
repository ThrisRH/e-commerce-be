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
        Schema::create('shipping_extra_fees', function (Blueprint $blueprint) {
            $blueprint->id();

            $blueprint->string('name');
            $blueprint->bigInteger('value');
            $blueprint->string('type')->default('fixed');
            $blueprint->float('coefficient')->default(1);

            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_extra_fees');
    }
};
