<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosSalesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pos_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_item_id');  // Link to the food item
            $table->integer('quantity_sold');                 // Quantity sold in the POS system
//            $table->double('total_amount');              // Total amount for the POS sale
//            $table->timestamp('sale_time');              // Date and time of the sale
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('food_item_id')->references('id')->on('food_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pos_sales');
    }
}
