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
        Schema::create('hotel_daily_prices', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('hotel_page_id');
            $table->foreignId('booking_engine_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
            $table->date('check_in_date');
            $table->boolean('is_available')->default(true);
            $table->float('nightly_price', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_daily_prices');
    }
};
