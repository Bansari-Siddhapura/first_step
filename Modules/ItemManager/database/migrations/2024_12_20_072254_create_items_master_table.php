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
            $table->increments('id'); // This creates an auto-incrementing unsigned integer as the primary key
            $table->string('item_id', 100);
            $table->string('item_name', 255);
            $table->string('version', 10)->default('0.0');
            $table->string('category', 255);
            $table->string('color', 20)->nullable();
            $table->unsignedBigInteger('client_id'); // Adding the client_id column
            $table->text('image_thumbnail_link')->nullable();
            $table->boolean('license_update')->default(false);
            $table->boolean('serve_latest_updates')->default(false);
            $table->boolean('download_multiple_version')->default(false);
            $table->timestamps();

            // Setting up the foreign key constraint
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items_master', function (Blueprint $table) {
            $table->dropForeign(['client_id']); // Dropping the foreign key constraint
        });
        Schema::dropIfExists('items_master');
    }
};
