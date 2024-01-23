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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('first_name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('nationality')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('email')->nullable();
            $table->integer('residence_country')->nullable();
            $table->string('residence_city')->nullable();
            $table->string('phone')->nullable();
            $table->string('card_no')->nullable();
            $table->string('expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
