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
        Schema::create('gift_description_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('regsitration_no')->nullable();
            $table->bigInteger('function_id')->unsigned();
            $table->string('gift_presented_by', 350);
            $table->integer('no_of_members');
            $table->string('sender_type', 50);
            $table->string('artist_name', 350);
            $table->string('type_of_gift', 50);
            $table->integer('quantity');
            $table->string('gift_handover_by', 350);
            $table->string('gift_sent_to', 350);
            $table->string('descriptions', 350)->nullable();
            $table->string('remarks', 350)->nullable();
            $table->date('date_of_description')->default(now());
            $table->bigInteger('country_id')->unsigned()->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->bigInteger('district_id')->unsigned()->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            
            $table->foreign('function_id')->references('id')->on('create_function_details')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('country_masters')->onDelete('cascade')->nullable();
            $table->foreign('state_id')->references('id')->on('state_masters')->onDelete('cascade')->nullable(); // Add nullable() here
            $table->foreign('district_id')->references('id')->on('district_masters')->onDelete('cascade')->nullable(); // Add nullable() here
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gift_description_details');
    }
};
