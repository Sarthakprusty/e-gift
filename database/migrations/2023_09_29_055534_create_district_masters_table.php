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
        Schema::create('district_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('district_name',250);
            $table->string('district_code',150)->nullable();
            $table->string('district_abbreviation',150)->nullable();
            $table->bigInteger('state_id')->unsigned();
            $table->boolean('status')->default(1);
            $table->timestamps();


            $table->foreign('state_id')->references('id')->on('state_masters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('district_masters');
    }
};
