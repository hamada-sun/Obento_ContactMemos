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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('received_date')->notNull();
            $table->foreignId('daily_menu_id')->notNull()
                ->constrained('daily_menus');
            $table->foreignId('customer_id')->notNull()
                ->constrained('customers');
            $table->date('delivery_date')->notNull();
            $table->time('preferred_delivery_time')->notNull();
            $table->boolean('no_miso_soup')->notNull()->default(false);
            $table->boolean('no_cup_for_miso')->notNull()->default(false);
            $table->boolean('no_chopsticks')->notNull()->default(false);
            $table->boolean('buy_coupon_ticket')->notNull()->default(false);
            $table->text('note')->nullable();
            $table->foreignId('contact_person_id')->nullable()
                ->constrained('staff_members');
            $table->timestamp('derivered')->nullable();
            $table->boolean('is_paid')->notNull()->default(false);
            $table->integer('payment_method_id')->notNull()->default(0);
            $table->boolean('is_discounted')->notNull()->default(false);
            $table->foreignId('deliverer_id')->nullable()
                ->constrained('staff_members');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
