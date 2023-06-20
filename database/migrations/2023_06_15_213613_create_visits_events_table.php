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
        Schema::create('visits_events', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->string('event_type', 255)->nullable();
            $table->string('token', 255)->nullable();
            $table->string('fingerprint', 255)->nullable();
            $table->string('ip', 255)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->text('referer')->nullable();
            $table->text('path')->nullable();
            $table->text('uri')->nullable();
            $table->json('query')->nullable();
            $table->json('event_data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits_events');
    }
};
