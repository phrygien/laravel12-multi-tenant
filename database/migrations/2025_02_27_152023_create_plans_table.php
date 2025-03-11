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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('price')->default(0);
            $table->boolean('have_trial')->default(true);
            $table->text('description')->nullable();
            $table->boolean('is_popular')->default(false);
            $table->integer('limit_users')->default(0);
            $table->integer('limit_domains')->default(0);
            $table->integer('limit_customers')->default(0);
            $table->integer('limit_modules')->default(0);
            $table->integer('limit_features')->default(0);
            $table->integer('limit_vendors')->default(0);
            $table->integer('limit_products')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};