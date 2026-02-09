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
        Schema::create('customers', function (Blueprint $table) {
            $table->integer('id')->primary();

            $table->string('name', 50)->notNull();

            $table->integer('default_payment_method_id')->notNull()->default(0);

            $table->char('phone_number',10)->nullable();
            $table->char('mobile_number',11)->nullable();

            $table->boolean('default_no_miso_soup')->notNull()->default(false);
            $table->boolean('default_no_cup_for_miso')->notNull()->default(false);
            $table->boolean('default_no_chopsticks')->notNull()->default(false);

            $table->integer('point_balance')->notNull()->default(0);
            $table->text('note')->nullable();

            $table->foreignId('destination_id')->notNull()->constrained('destinations');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
