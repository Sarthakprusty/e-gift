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
        Schema::create('function_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('function_no')->nullable();
            $table->string('function_type', 250);
            $table->string('function_name', 350)->nullable();
            $table->date('date_of_function')->nullable();
            $table->bigInteger('country_id')->unsigned();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->bigInteger('district_id')->unsigned()->nullable();
            $table->string('function_location_name', 350);
            $table->boolean('status')->default(1);
            $table->timestamps();
        
            $table->foreign('country_id')->references('id')->on('country_masters')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('state_masters')->onDelete('cascade')->nullable(); // Add nullable() here
            $table->foreign('district_id')->references('id')->on('district_masters')->onDelete('cascade')->nullable(); // Add nullable() here
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('function_details');
    }
};
