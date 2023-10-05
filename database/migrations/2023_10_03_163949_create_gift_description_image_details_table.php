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
        Schema::create('gift_description_image_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('gift_description_id')->unsigned();
            $table->string('gift_image_path', 350);
            $table->timestamps();

            $table->foreign('gift_description_id')->references('id')->on('gift_description_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_description_image_details');
    }
};
