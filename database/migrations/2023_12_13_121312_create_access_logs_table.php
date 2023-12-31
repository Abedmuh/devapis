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
        Schema::create('access_log', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('route');
            $table->text('parameters');
            $table->string('method');
            $table->integer('code')->nullable();
            $table->string('message')->nullable();
            $table->string('ip');
            $table->timestamp("timestamp");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_logs');
    }
};
