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
        Schema::create('country_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country_name',250);
            $table->string('country_code',150)->nullable();
            $table->string('country_abbreviation',250)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('country_masters');
    }
};
