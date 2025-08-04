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
        Schema::create('irrigations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->float('applicationAmount');
            $table->dateTime('irrigationDate');
            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignUuid('pivot_id')->constrained('pivots');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irrigations');
    }
};
