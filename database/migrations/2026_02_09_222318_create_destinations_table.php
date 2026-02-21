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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->char('postal_code', 8)->nullable();

            $table->string('prefecture')->nullable();
            $table->string('city')->notNull();
            $table->string('street_address')->notNull();
            $table->string('building_name')->nullable();

            $table->string('full_address', 255)->nullable();
            $table->boolean('is_billing_address')->notNull()->default(true);
            $table->decimal('latitude', 9, 6)->nullable();
            $table->decimal('longitude', 9, 6)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinations');
    }
};
