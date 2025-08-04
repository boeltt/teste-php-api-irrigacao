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
        Schema::create('pivots', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('description');
            $table->float('flowRate');
            $table->float('minApplicationDepth');
            $table->foreignUuid('user_id')->constrained('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivots');
    }
};
