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
        Schema::create('items_master', function (Blueprint $table) {
            $table->id();
            $table->string('item_id', 100);
            $table->string('item_name', 255);
            $table->string('version', 10)->default('0.0');
            $table->string('category', 255);
            $table->string('color', 20)->nullable();
            $table->text('image_thumbnail_link')->nullable();
            $table->boolean('license_update')->default(false);
            $table->boolean('serve_latest_updates')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_master');
    }
};