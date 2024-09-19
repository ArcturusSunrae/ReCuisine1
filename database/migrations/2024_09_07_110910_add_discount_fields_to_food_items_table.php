<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscountFieldsToFoodItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('food_items', function (Blueprint $table) {
            $table->double('discount_rate')->default(50); // Default discount rate of 50%
            $table->integer('inventory_threshold')->default(30); // 30% inventory threshold
            $table->integer('time_before_closing')->default(3); // 3 hours before closing
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('food_items', function (Blueprint $table) {
            $table->dropColumn(['discount_rate', 'inventory_threshold', 'time_before_closing']);
        });
    }
}
