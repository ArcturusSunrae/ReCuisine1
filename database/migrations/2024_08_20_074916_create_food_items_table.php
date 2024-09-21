<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('food_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->double('price');
            $table->unsignedBigInteger('supplier_id');
            $table->string('supplier');
            $table->string('category');
            $table->integer('stock');
            $table->text('tags');


          //
              $table->foreign('supplier_id')->references('id')->on('users')->onDelete('cascade');



            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('food_items');
    }
};
