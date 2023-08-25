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
        Schema::create('winners', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('tournament_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('winner1')->nullable();
            $table->string('winner2')->nullable();
            $table->string('winner3')->nullable();
            $table->string('runner_up1')->nullable();
            $table->string('runner_up2')->nullable();
            $table->string('runner_up3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('winners');
    }
};
