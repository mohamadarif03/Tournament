<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 150);
            $table->text('description');
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('live_image_url');
            $table->timestamp('completed_at')->useCurrent();
            $table->timestamp('starter_at')->useCurrent();
            $table->boolean('is_open_signup')->default(1);
            $table->integer('slot')->default(8);
            $table->integer('price_pool')->nullable();
            $table->foreignUuid('game_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('location');
            $table->integer('registration_fee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
};
