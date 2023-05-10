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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('car');
            $table->unsignedInteger('customer');
            $table->unsignedInteger('vendor');
            $table->unsignedInteger('income');
            $table->dateTime('date');
            $table->foreign('car')->references('id')->on('cars')->onDelete('cascade');
            $table->foreign('customer')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('vendor')->references('id')->on('vendors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
