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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->unsignedBigInteger('user_id');  // Foreign key to the users table
            $table->string('business_name'); // Business name of the supplier
            $table->string('phone');  // Phone number
            $table->string('location');  // Location of the supplier
            $table->time('closing_time');
            $table->timestamps();  // Created at and updated at

            // Foreign key constraint: links to the users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
