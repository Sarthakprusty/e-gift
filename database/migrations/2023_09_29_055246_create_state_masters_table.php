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
        Schema::create('state_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('state_code',150)->nullable();
            $table->string('state_abbreviation',150)->nullable();
            $table->string('state_name',150);
            $table->string('category',150)->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_masters');
    }
};
